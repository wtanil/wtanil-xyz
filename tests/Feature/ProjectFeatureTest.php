<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Project;

class ProjectFeatureTest extends TestCase
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
     *  @group FeatureProject
     */
    public function guest_can_not_access_project_creation_page()
    {
        // Arrange
        // Act
        $response = $this->get(action('ProjectController@create'));
        // Assert
        $response->assertRedirect(action('Auth\LoginController@showLoginForm'));
        
    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function admin_can_access_project_creation_page()
    {
        // Arrange
        // Act
        $response = $this->actingAs($this->user)->get(action('ProjectController@create'));

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('projects.create');

    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function guest_can_not_create_project() {

        // Arrange
        $factoryProject = factory(Project::class)->make();

        // Act
        $response = $this->from('projects')->post(route('projects'), $factoryProject->toArray());

        // Assert
        $response->assertRedirect(action('Auth\LoginController@showLoginForm'));
    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function admin_can_create_project()
    {
        // Arrange
        $factoryProject = factory(Project::class)->make();

        // Act
        $response = $this->actingAs($this->user)->from('projects')->post(route('projects'), $factoryProject->toArray());

        // Assert
        $response->assertRedirect(route('projects'));
        $this->assertDatabaseHas('projects', $factoryProject->toArray());
    }




    /**
     *  @test
     *  @group FeatureProject
     */
    public function guest_can_not_access_project_index_page()
    {
        // Arrange
        // Act
        $response = $this->get(route('projects'));
        // Assert
        $response->assertRedirect(action('Auth\LoginController@showLoginForm'));
    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function admin_can_access_project_index_page()
    {
        // Arrange
        // Act
        $response = $this->actingAs($this->user)->get(route('projects'));

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('projects.index');
    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function admin_can_see_all_projects_in_index_page()
    {
        // Arrange
        $factoryHiddenProject = factory(Project::class)->create();
        $factoryProject = factory(Project::class)->create([
            'hidden' => false
        ]);

        // Act
        $response = $this->actingAs($this->user)->get(route('projects'));

        // Assert
        $response->assertSee($factoryHiddenProject['name']);
        $response->assertSee($factoryHiddenProject['hidden']);
        $response->assertSee($factoryHiddenProject['start_date']);
        $response->assertSee($factoryHiddenProject['last_update_date']);

        $response->assertSee($factoryProject['name']);
        $response->assertSee($factoryProject['hidden']);
        $response->assertSee($factoryProject['start_date']);
        $response->assertSee($factoryProject['last_update_date']);
    }




    /**
     *  @test
     *  @group FeatureProject
     */
    public function guest_can_not_set_project_to_hidden()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create([
            'hidden' => false
        ]);
        $id = $factoryProject->id;
        // Act
        $response = $this->from('projects')->put(route('projects.toggle', ['id' => $id]));
        // Assert
        $response->assertRedirect(action('Auth\LoginController@showLoginForm'));


    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function admin_can_set_project_to_hidden()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create([
            'hidden' => false
        ]);
        $id = $factoryProject->id;

        // Act
        $response = $this->actingAs($this->user)->from('projects')->put(route('projects.toggle', ['id' => $id]));

        // Assert
        $response->assertRedirect(route('projects'));
        $response->assertDontSee($factoryProject['name']);

    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function admin_can_set_project_to_visible()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create();
        $id = $factoryProject->id;

        // Act
        $response = $this->actingAs($this->user)->from('projects')->put(route('projects.toggle', ['id' => $id]));
        // Assert
        $response->assertRedirect(route('projects'));


        // Another test to make sure that the project is not visible on index page
        // Act
        $response = $this->followingRedirects()->actingAs($this->user)->from('projects')->get(route('projects'));
        // Assert
        $response->assertSee($factoryProject['name']);

    }


}
