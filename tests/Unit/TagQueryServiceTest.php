<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Tag;
use App\Services\TagQueryService;

class TagQueryServiceTest extends TestCase
{

    use RefreshDatabase;

    protected $tagQueryService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tagQueryService = $this->app->make(TagQueryService::class);


    }

    /**
     *  @test
     *  @group UnitTagQueryService
     */
    public function getAll_Empty_ReturnNothing()
    {
        // Arrange
        // Act
        $tags = $this->tagQueryService->getAll();

        // Assert
        $this->assertCount(0, $tags);
        
    }

    /**
     *  @test
     *  @group UnitTagQueryService
     */
    public function getAll_WithTagsInDB_ReturnAll()
    {
        // Arrange
        $factoryTag = factory(Tag::class, 2)->create();

        // Act
        $tags = $this->tagQueryService->getAll();

        // Assert
        $this->assertCount(2, $tags);
        
    }


}
