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





}
