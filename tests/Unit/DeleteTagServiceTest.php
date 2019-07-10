<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Tag;
use App\Services\DeleteTagService;

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
        $deleted = $this->deleteTagService->delete($id);

        // Assert
        $this->assertEquals(1, $deleted);
        $this->assertDatabaseMissing('tags', $tag->toArray());
    }
}
