<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Tag;
use App\Http\Requests\StoreTagRequest;

class TagFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $storeTagRequest;

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
    public function guest_can_not_access_tag_creation_page()
    {
        // Arrange
        // Act
        $response = $this->get(action('TagController@create'));
        // Assert
        $response->assertRedirect(action('Auth\LoginController@showLoginForm'));
        
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function admin_can_access_tag_creation_page()
    {
        // Arrange
        // Act
        $response = $this->actingAs($this->user)->get(action('TagController@create'));

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('tags.create');

    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function guest_can_not_create_tag() {

        // Arrange
        $factoryTag = factory(Tag::class)->make();
        // Act
        $response = $this->actingAs($this->user)->from('tags')->post(route('tags'), $factoryTag->toArray());
        // Assert
        $response->assertRedirect(route('tags'));
        // $this->followingRedirects()->assertRedirect('Auth\LoginController@showLoginForm');
        // $response->assertRedirect(action('Auth\LoginController@showLoginForm'));
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function admin_can_create_tag()
    {
        // Arrange
        $factoryTag = factory(Tag::class)->make();

        // Act
        $response = $this->actingAs($this->user)->from('tags')->post(route('tags'), $factoryTag->toArray());

        // Assert
        $response->assertRedirect(route('tags'));
        $this->assertDatabaseHas('tags', $factoryTag->toArray());
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function admin_can_not_create_tag_without_name()
    {
        // Arrange
        $factoryTag = factory(Tag::class)->make([
            'name' => null
        ]);

        // Act
        $response = $this->actingAs($this->user)->from('tags/create')->post(action('TagController@store'), $factoryTag->toArray());

        // Assert
        $response->assertRedirect(route('tags.create'));
        $response->assertSessionHasErrors(['name']);
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function admin_can_not_create_tag_without_priority()
    {
        // Arrange
        $factoryTag = factory(Tag::class)->make([
            'priority' => null
        ]);
      
        // Act
        $response = $this->actingAs($this->user)->from('tags/create')->post(action('TagController@store'), $factoryTag->toArray());

        // Assert
        $response->assertRedirect(route('tags.create'));
        $response->assertSessionHasErrors(['priority']);
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function admin_can_not_create_tag_without_color()
    {
        // Arrange
        $factoryTag = factory(Tag::class)->make([
            'color' => null
        ]);

        // Act
        $response = $this->actingAs($this->user)->from('tags/create')->post(action('TagController@store'), $factoryTag->toArray());

        // Assert
        $response->assertRedirect(route('tags.create'));
        $response->assertSessionHasErrors(['color']);
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function guest_can_not_access_tag_index_page()
    {
        // Arrange
        // Act
        $response = $this->get(route('tags'));
        // Assert
        $response->assertRedirect(action('Auth\LoginController@showLoginForm'));
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function admin_can_access_tag_index_page()
    {
        // Arrange
        // Act
        $response = $this->actingAs($this->user)->get(route('tags'));

        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('tags.index');
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function admin_can_see_all_tags_in_index_page()
    {
        // Arrange
        $factoryTag = factory(Tag::class)->create();

        // Act
        $response = $this->actingAs($this->user)->get(route('tags'));

        // Assert
        $response->assertSee($factoryTag['name']);
        $response->assertSee($factoryTag['priority']);
        $response->assertSee($factoryTag['color']);
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function guest_can_not_delete_a_tag()
    {
        // Arrange
        $factoryTag = factory(Tag::class)->create();
        $id = $factoryTag->id;

        // Act
        $response = $this->delete(route('tags.delete', ['id' => $id]));

        // Assert
        $response->assertRedirect(route('tags'));
        
    }

    /**
     *  @test
     *  @group FeatureTag
     */
    public function admin_can_delete_a_tag()
    {
        // Arrange
        $factoryTag = factory(Tag::class)->create();
        $id = $factoryTag->id;

        // Act
        $response = $this->actingAs($this->user)->delete(route('tags.delete', ['id' => $id]));

        // Assert
        $response->assertDontSee($factoryTag['name']);
        $response->assertRedirect(route('tags'));
        $this->assertDatabaseMissing('tags', $factoryTag->toArray());
    }






    

}