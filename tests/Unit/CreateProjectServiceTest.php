<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Tag;
use App\Services\CreateProjectService;

class CreateProjectServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $createProjectService;

    protected function setUp(): void
    {

        parent::setUp();

        $this->createProjectService = $this->app->make(CreateProjectService::class);

    }


    /**
     *  @test
     *  @group UnitCreateProjectService
     */
    public function create_ValidRequirements_ProjectIsCreated()
    {
        // Arrange
        $factoryProject = factory(Project::class)->make();
        $inputs = [
            'name' => $factoryProject->name,
            'description' => $factoryProject->description,
            'hidden' => $factoryProject->hidden,
            'start_date' => $factoryProject->start_date,
            'last_update_date' => $factoryProject->last_update_date
        ];

        // Act
        $this->createProjectService->create($inputs);

        // Assert
        $this->assertDatabaseHas('projects', $inputs);
    }
}
