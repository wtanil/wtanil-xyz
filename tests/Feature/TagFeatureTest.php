<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Tag;

class TagFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {

        parent::setUp();

        $this->user = factory(User::class)->create();

    }


    /**
     *  @test
     *  @group FeatureTag
     */
    public function admin_can_create_tag()
    {

        // Arrange
        $factoryTag = factory(Tag::class)->make();
        $tagValues = [
                        'name' => $factoryTag->name,
                        'priority' => $factoryTag->priority,
                        'color' => $factoryTag->color,
                        'hidden' => $factoryTag->hidden
                    ];

        // Act
        $response = $this->actingAs($user)->post(action('TagController@store'), $tagValues);

        // Assert
        $response->assertDatabaseHas('tags', $tagValues);
        $response->assertViewIs('tags.index');
        $response->assertSee($tag->name);

        


    }

}