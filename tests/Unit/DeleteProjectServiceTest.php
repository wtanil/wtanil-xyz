<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Project;
use App\Services\DeleteProjectService;

class DeleteProjectServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $deleteProjectService;
    protected $factoryProjects;

    protected function setUp(): void
    {

        parent::setUp();

        $this->deleteProjectService = $this->app->make(DeleteProjectService::class);

        $this->factoryProjects = factory(Project::class, 5)->create();

    }


    /**
     *  @test
     *  @group UnitDeleteProjectService
     */
    public function delete_ValidRequirements_ProjectIsDeleted()
    {
        // Arrange
        $project = $this->factoryProjects->first();
        $id = $project->id;

        // Act
        $deleted = $this->deleteProjectService->delete($id);

        // Assert
        $this->assertEquals(1, $deleted);
        $this->assertDatabaseMissing('projects', $project->toArray());
    }
}
