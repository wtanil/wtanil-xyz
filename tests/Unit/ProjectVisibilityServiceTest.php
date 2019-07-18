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
    public function toggle_Hidden_Shown()
    {
        // Arrange
        // Act
        // Assert
    }

    /**
     *  @test
     *  @group UnitProjectVisibilityService
     */
    public function toggle_Shown_Hidden()
    {
        // Arrange
        // Act
        // Assert
    }
}
