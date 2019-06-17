<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Repositories\ProjectRepository;
use App\Project;
use App\User;

class ProjectRepositoryTest extends TestCase {

	use RefreshDatabase;
    protected $project;
    protected $user;

    protected function setUp(): void {

        parent::setUp();

        $this->project = new ProjectRepository();
        $this->user = factory(User::class)->create();

    }
    
    /**
     *  @test
     *  @group UnitProjectRepository
     */
    public function ForPublic_Empty_ReturnEmpty() {

        // Arrange
        // Act
        // Assert
        $this->assertCount(0, $this->project->forPublic());
    }

    /**
     *  @test
     *  @group UnitProjectRepository
     */
    public function ForPublic_WithOnlyProjects_ReturnProjects() {
        // Arrange
        factory(Project::class, 2)->state('nothidden')->create(
            [ 'user_id' => $this->user->id,
            ]);
        // Act
        // Assert
        $this->assertCount(2, $this->project->forPublic());
        
    }

    /**
     *  @test
     *  @group UnitProjectRepository
     */
    public function ForPublic_WithOnlyHiddenProjects_ReturnEmpty() {
        // Arrange
        factory(Project::class, 2)->create(
            [ 'user_id' => $this->user->id,
            ]);
        // Act
        // Assert
        $this->assertCount(0, $this->project->forPublic());

    }

    /**
     *  @test
     *  @group UnitProjectRepository
     */
    public function ForPublic_WithProjectsAndHiddenProjects_ReturnOnlyProjects() {
        // Arrange
        factory(Project::class, 2)->create(
            [ 'user_id' => $this->user->id,
            ]);
        factory(Project::class, 2)->state('nothidden')->create(
            [ 'user_id' => $this->user->id,
            ]);
        // Act
        // Assert
        $this->assertCount(2, $this->project->forPublic());
    }

    /**
     *  @test
     *  @group UnitProjectRepository
     */
    public function All_Empty_ReturnEmpty() {

        // Arrange
        // Act
        // Assert
        $this->assertCount(0, $this->project->all());
    }

    /**
     *  @test
     *  @group UnitProjectRepository
     */
    public function All_WithProjects_ReturnProjects() {
        // Arrange
        factory(Project::class, 2)->create(
            [ 'user_id' => $this->user->id,
            ]);
        factory(Project::class, 2)->state('nothidden')->create(
            [ 'user_id' => $this->user->id,
            ]);
        // Act
        // Assert
        $this->assertCount(4, $this->project->all());
    }







}
