<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

// use Mockery;

use App\Services\ProjectService;
use App\Contracts\ProjectInterface;

use App\User;


class ProjectServiceTest extends TestCase
{

    protected $projectService;
    protected $user;
    protected $projectRepoMock;

    protected function setUp(): void
    {

        parent::setUp();

        $this->projectRepoMock = $this->mock(ProjectInterface::class);
        $this->projectService = $this->app->make(ProjectService::class);
        $this->user = factory(User::class)->make();


    }

    /**
     *  @test
     *  @group ProjectService
     */
    public function All_UserIsAdmin_AllIsCalled()
    {
        // Arrange
        $this->actingAs($this->user);
        $this->projectRepoMock->shouldReceive('all')->once();

        // Act
        $this->projectService->all();

        // Assert
    }

    /**
     *  @test
     *  @group ProjectService
     */
    public function All_UserIsGuest_ForPublicIsCalled()
    {
        // Arrange
        $this->projectRepoMock->shouldReceive('forPublic')->once();

        // Act
        $this->projectService->all();
        // Assert
    }





}
