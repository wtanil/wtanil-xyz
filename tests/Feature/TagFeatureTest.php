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

        // $this->withoutExceptionHandling();

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
                        'color' => $factoryTag->color
                    ];

        // Act
        $response = $this->actingAs($this->user)->post(action('TagController@store'), $tagValues);

        // Assert
        $response->assertRedirect(action('TagController@index'));
        $this->assertDatabaseHas('tags', $tagValues);

        


    }

}