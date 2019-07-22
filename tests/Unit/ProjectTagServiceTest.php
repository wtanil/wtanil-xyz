<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Project;
use App\Tag;
use App\Services\ProjectTagService;

class ProjectTagServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $projectTagService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->projectTagService = $this->app->make(ProjectTagService::class);

    }

    /**
     *  @test
     *  @group UnitProjectTagService
     */
    public function attach_ValidProjectAndTag_TagIsAttached()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create();
        $id = $factoryProject->id;
        $factoryTags = factory(Tag::class, 5)->create();
        $tagIds = $factoryTags->pluck('id');

        // Act
        $results = $this->projectTagService->attach($factoryProject->id, $tagIds);

        // Assert
        $this->assertCount(5, count($results['attached']));
        $this->assertCount(5, $factoryProject->tags->count());


    }


}
