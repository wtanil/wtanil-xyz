<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Tag;
use App\Services\TagQueryService;

class TagQueryServiceTest extends TestCase
{

    protected $tagQueryService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tagQueryService = $this->app->make(TagQueryService::class);


    }


    /**
     *  @test
     *  @group UnitCreateTagService
     */
    public function get__ReturnAll()
    {
        // Arrange
        $factoryTag = factory(Tag::class)->create();
        
        // Act
        $tags = $this->tagQueryService->get();

        // Assert
        $this->assertEqual($factoryTag->toArray(), $tags->toArray());
        
    }


}
