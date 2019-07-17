<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Project;
use App\Services\ProjectQueryService;

class ProjectQueryServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $projectQueryService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->projectQueryService = $this->app->make(ProjectQueryService::class);


    }

    /**
     *  @test
     *  @group UnitProjectQueryService
     */
    public function getAll_Empty_ReturnNothing()
    {
        // Arrange
        // Act
        $projects = $this->projectQueryService->getAll();

        // Assert
        $this->assertCount(0, $projects);
        
    }

    /**
     *  @test
     *  @group UnitProjectQueryService
     */
    public function getAll_WithHiddenProjectsInDB_ReturnAll()
    {
        // Arrange
        $factoryHiddenProject = factory(Project::class, 2)->create();
        $factoryProject = factory(Project::class, 3)->create([
            'hidden' => false
        ]);

        // Act
        $projects = $this->projectQueryService->getAll();

        // Assert
        $this->assertCount(5, $projects);
        
    }

    /**
     *  @test
     *  @group UnitProjectQueryService
     */
    public function forPublic_Empty_ReturnNothing()
    {
        // Arrange
        // Act
        $projects = $this->projectQueryService->forPublic();

        // Assert
        $this->assertCount(0, $projects);
        
    }

    /**
     *  @test
     *  @group UnitProjectQueryService
     */
    public function getAll_WithHiddenProjectsInDB_ReturnNotHiddenProjects()
    {
        // Arrange
        $factoryHiddenProject = factory(Project::class, 2)->create();
        $factoryProject = factory(Project::class, 3)->create([
            'hidden' => false
        ]);

        // Act
        $projects = $this->projectQueryService->forPublic();

        // Assert
        $this->assertCount(3, $projects);
        
    }





}
