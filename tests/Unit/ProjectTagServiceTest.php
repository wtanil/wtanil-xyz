<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\ProjectService;
use App\Project;
use App\User;

class ProjectTagServiceTest extends TestCase
{
    use RefreshDatabase;
    protected $projectTagService;
    protected $project;
    protected $user;

    protected function setUp(): void {

        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->project = factory(Project::class)->create(
            [ 'user_id' => $this->user->id]
        );

        $this->projectTagService = $this->app->make(ProjectTagService::class);
    }

    /**
     *  @test
     *  @group ProjectTagService
     */
    public function Sync_AttachATag_TagIsAttached()
    {
        // Arrange
        $tag = factory(Tag::class)->create();
        // Act
        $this->projectTagService->sync($this->project->id, $tag->id);
        // Assert
        
    }

    /**
     *  @test
     *  @group ProjectTagService
     */
    public function Sync_AttachMultipleTags_TagsAreAttached()
    {
        // Arrange
        // Act
        // Assert
    }

    /**
     *  @test
     *  @group ProjectTagService
     */
    public function Sync_DetachATag_TagIsDetached()
    {
        // Arrange
        // Act
        // Assert
    }

    /**
     *  @test
     *  @group ProjectTagService
     */
    public function Sync_DetachMultipleTags_TagsAreDetached()
    {
        // Arrange
        // Act
        // Assert
    }
}
