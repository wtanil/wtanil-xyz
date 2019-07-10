<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Tag;
use App\Services\CreateTagService;

class DeleteTagServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $deleteTagService;
    protected $factoryTags;

    protected function setUp(): void
    {

        parent::setUp();

        $this->deleteTagService = $this->app->make(DeleteTagService::class);

        $this->factoryTags = factory(Tag::class, 5)->create();

    }


    /**
     *  @test
     *  @group UnitCreateTagService
     */
    public function delete_ValidRequirements_TagIsDeleted()
    {
        // Arrange
        $tag = $this->factoryTags->first();
        $id = $tag->id;

        // Act
        $this->deleteTagService->delete($id);

        // Assert
        $this->assertDatabaseMissing('tags', $tag);
    }
}
