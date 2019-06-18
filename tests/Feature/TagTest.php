<?php

namespace Tests\Feature;



use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Tag;

class TagTest extends TestCase
{

    use RefreshDatabase;

    /**
     *  @test
     *  @group FeatureTag
     */
    public function guest_can_see_tags()
    {
        // Arrange
        $tags = factory(Tag::class)->create();
        $tagName = $tags->name;

        // Act
        $response = $this->call('GET', '/tags');

        // Assert
        $response->assertSee($tagName);

    }
}
