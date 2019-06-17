<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Repositories\TagRepository;
use App\Tag;

class TagRepositoryTest extends TestCase
{

    use RefreshDatabase;

    protected $tag;
    
    protected function setUp(): void
    {

        parent::setUp();

        $this->tag = $this->app->make(TagRepository::class);

    }

    /**
     *  @test
     *  @group TagRepository
     */
    public function All_Empty_ReturnEmpty()
    {
        // Arrange
        // Act
        // Assert
        $this->assertCount(0, $this->tag->all());
    }

    /**
     *  @test
     *  @group TagRepository
     */
    public function All_WithTags_ReturnTags()
    {
        // Arrange
        factory(Tag::class, 2)->create();
        // Act
        // Assert
        $this->assertCount(2, $this->tag->all());
    }






}
