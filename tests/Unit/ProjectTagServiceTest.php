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
        $this->assertCount(5, $results['attached']);
        $this->assertCount(5, $factoryProject->tags);


    }

    /**
     *  @test
     *  @group UnitProjectTagService
     */
    public function detach_ValidProjectAndTag_TagIsDetached()
    {
        // Arrange
        $factoryProject = factory(Project::class)->create();
        $factoryTags = factory(Tag::class, 5)->create();
        $id = $factoryProject->id;
        $tagIds = $factoryTags->pluck('id');
        $factoryProject->tags()->sync($tagIds);

        // Act
        $results = $this->projectTagService->attach($factoryProject->id, []);
        // Assert
        $this->assertCount(5, $results['detached']);
        $this->assertCount(0, $factoryProject->tags);


    }


}
