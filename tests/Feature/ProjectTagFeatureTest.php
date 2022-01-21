<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Project;
use App\Tag;

class ProjectTagFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {

        parent::setUp();

        $this->user = factory(User::class)->create();

        // $this->withoutExceptionHandling();

    }

    /**
     *  @test
     *  @group FeatureProjectTag
     */
    public function guest_can_not_attach_tag_to_project()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create([
            'hidden' => false
        ]);
        $id = $factoryProject->id;
        $factoryTags = factory(Tag::class, 5)->create();
        $tagIds = $factoryTags->pluck('id');

        // Act
        $response = $this->post(route('projecttag.attach', ['id' => $id]), $tagIds->toArray());

        // Assert
        $response->assertRedirect(action('Auth\LoginController@showLoginForm'));
        
    }



    /**
     *  @test
     *  @group FeatureProjectTag
     */
    public function admin_can_attach_tag_to_project()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create([
            'hidden' => false
        ]);
        $id = $factoryProject->id;
        $factoryTags = factory(Tag::class, 5)->create();
        $tagIds = $factoryTags->pluck('id');

        // Act
        $response = $this->actingAs($this->user)->post(
            route('projecttag.attach', ['id' => $id]), ['tagIds' => $tagIds->toArray()]
        );
        $responseHomePage = $this->get(route('projects'));

        // Assert
        $response->assertRedirect(route('projects'));
        // Another test to make sure that the tag is visible on home page
        // WARNING: if the project contains detail that is same as tag name, it will pass, even if the attaching process is failed. For example, if a project is named "Blue" and if a attached tag is also named "Blue" this test will failed, it shouldn't since the "Blue" is the project name, not the tag
        // This is a bad test. Need future improvement, but no immediate effect since the environment of the test is setup in a way that the scenario will not happen
        foreach ($factoryTags as $factoryTag)
        {
            $responseHomePage->assertSee($factoryTag['name']);
        }

    }

    /**
     *  @test
     *  @group FeatureProjectTag
     */
    public function guest_can_not_access_project_tag_page()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create();
        // Act
        $response = $this->get(route('projecttag.show', ['id' => $factoryProject->id]));
        // Assert
        $response->assertRedirect(action('Auth\LoginController@showLoginForm'));
        
    }

    /**
     *  @test
     *  @group FeatureProjectTag
     */
    public function admin_can_access_project_tag_page()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create();
        // Act
        $response = $this->actingAs($this->user)->get(route('projecttag.show', ['id' => $factoryProject->id]));
        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('projecttag.show');
        
    }

    /**
     *  @test
     *  @group FeatureProjectTag
     */
    public function admin_can_detach_tag_from_project()
    {
        // Arrange

        $factoryProject = factory(Project::class)->create();
        $factoryTags = factory(Tag::class, 5)->create();
        $id = $factoryProject->id;
        $tagIds = $factoryTags->pluck('id');
        $factoryProject->tags()->sync($tagIds);

        // Act
        $response = $this->actingAs($this->user)->post(
            route('projecttag.attach', ['id' => $id]), ['tagIds' => []]
        );
        $responseHomePage = $this->get(route('projects'));

        // Assert
        $response->assertRedirect(route('projects'));
        // Another test to make sure that the tag is removed on home page
        // WARNING: if the project contains detail that is same as tag name, it will fail, where it shouldn't. For example, if a project is named "Blue" and if a detached tag is also named "Blue" this test will failed, it shouldn't since the "Blue" is the project name, not the tag
        // This is a bad test. Need future improvement, but no immediate effect since the environment of the test is setup in a way that the scenario will not happen
        foreach ($factoryTags as $factoryTag)
        {
            $responseHomePage->assertDontSee($factoryTag['name']);
        }

    }


}
