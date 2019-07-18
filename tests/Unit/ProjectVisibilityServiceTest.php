<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Project;
use App\Services\ProjectVisibilityService;

class ProjectVisibilityServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $projectVisibilityService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->projectVisibilityService = $this->app->make(ProjectVisibilityService::class);

    }

    /**
     *  @test
     *  @group UnitProjectVisibilityService
     */
    public function toggle_Hidden_Visible()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create();
        $expectedProject = $factoryProject->toArray();
        $expectedProject['hidden'] = false;
        // Act
        $this->projectVisibilityService->toggleVisibility($factoryProject->id);
        // Assert
        $this->assertDatabaseHas('projects', $expectedProject);

    }

    /**
     *  @test
     *  @group UnitProjectVisibilityService
     */
    public function toggle_Visible_Hidden()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create([
            'hidden' => false
        ]);
        $expectedProject = $factoryProject->toArray();
        $expectedProject['hidden'] = true;
        // Act
        $this->projectVisibilityService->toggleVisibility($factoryProject->id);
        // Assert
        $this->assertDatabaseHas('projects', $expectedProject);
    }
}
