<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Project;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {

        parent::setUp();

        $this->user = factory(User::class)->create();

    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function guest_can_see_projects()
    {
        // Arrange
        $projects = factory(Project::class)->state('nothidden')->create(
            [ 'user_id' => $this->user->id,
            ]);
        $projectName = $projects->name;

        // Act
        $response = $this->call('GET', '/projects');

        // Assert
        $response->assertSee($projectName);

    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function guest_can_not_see_hidden_projects()
    {
        // Arrange
        $projects = factory(Project::class)->create(
            [ 'user_id' => $this->user->id,
            ]);
        $projectName = $projects->name;
        
        // Act
        $response = $this->call('GET', '/projects');

        // Assert
        $response->assertDontSee($projectName);
    }

    /**
     *  @test
     *  @group FeatureProject
     */
    public function admin_can_see_hidden_project()
    {
        // Arrange
        $this->actingAs($this->user);

        $projects = factory(Project::class)->create(
            [ 'user_id' => $this->user->id,
            ]);
        
        $projectName = $projects->name;

        // Act
        $response = $this->call('GET', '/projects');

        // Assert
        $response->assertSee($projectName);
    }





















}
