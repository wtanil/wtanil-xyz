<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Project;

class RepositoryFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {

        parent::setUp();

        // $this->withoutExceptionHandling();

    }


    /**
     *  @test
     *  @group FeatureRepository
     */
    public function admin_can_access_repository_index_page()
    {
        // Arrange
        $this->user = factory(User::class)->create();
        // Act
        $response = $this->actingAs($this->user)->get(route('repository'));

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('repository');

    }

    /**
     *  @test
     *  @group FeatureRepository
     */
    public function guest_can_access_repository_index_page()
    {
        // Arrange
        // Act
        $response = $this->get(route('repository'));

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('repository');

    }

    /**
     *  @test
     *  @group FeatureRepository
     */
    public function guest_can_see_projects()
    {
        // Arrange
        $factoryProjects = factory(Project::class, 2)->create();

        // Act
        $response = $this->get(route('repository'));

        // Assert
        foreach($factoryProjects as $factoryProject) {
            $response->assertSee($factoryProject['name']);
            $response->assertSee($factoryProject['start_date']);
        }

    }

    /**
     *  @test
     *  @group FeatureRepository
     */
    public function guest_can_not_see_hidden_projects()
    {
        // Arrange
        $factoryHiddenProjects = factory(Project::class, 2)->create([
            'hidden' => false
        ]);

        // Act
        $response = $this->get(route('repository'));

        // Assert

        foreach($factoryHiddenProjects as $factoryHiddenProject) {
            $response->assertDontSee($factoryHiddenProject['name']);
            $response->assertDontSee($factoryHiddenProject['start_date']);
        }

    }
}
