<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Repositories\ProjectRepository;
use App\Project;
use App\User;

class ProjectTest extends TestCase {

	use RefreshDatabase;
    protected $projectRepo;
    protected $user;

    protected function setUp(): void {

        parent::setUp();

        $this->projectRepo = new ProjectRepository();
        $this->user = factory(User::class)->create();

        // DO I NEED TO RUN THIS FOR EVERY RUN
        // $this->project = factory(Project::class)->create();
    }

    /**
     *  @test
     *	@group ProjectRepository
     */
    public function All_GuestNoProject_ReturnEmpty() {
        // Arrange
        // Act
        // Assert
        $this->assertCount(0, $this->projectRepo->all());
    }

    /**
     *  @test
     *  @group ProjectRepository
     */
    public function All_GuestOnlyHiddenProject_ReturnEmpty() {
        // Arrange
        $project = factory(Project::class, 2)->create(
            [ 'user_id' => $this->user->id,
            ]);
        // Act
        // Assert
        $this->assertCount(0, $this->projectRepo->all());
    }

	/**
	 *  @test
     *	@group ProjectRepository
     */
    public function All_GuestWithProjects_ReturnAllProjects() {
        // Arrange
        $project = factory(Project::class, 2)->state('nothidden')->create(
            [ 'user_id' => $this->user->id,
            ]);
        // Act
        // Assert
        $this->assertCount(2, $this->projectRepo->all());

    }

    /**
     *  @test
     *  @group ProjectRepository
     */
    public function All_AdminWithHiddenProjects_ReturnAllProjects() {
        // Arrange
        $project = factory(Project::class, 2)->create(
            [ 'user_id' => $this->user->id,
            ]);
        // Act
        // Assert
        $this->assertCount(2, $this->projectRepo->all($this->user->id));
    }










}
