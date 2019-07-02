<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Tag;
use App\Services\CreateTagService;

class CreateTagServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $createTagService;

    protected function setUp(): void
    {

        parent::setUp();

        $this->createTagService = $this->app->make(CreateTagService::class);

    }


    /**
     *  @test
     *  @group UnitCreateTagService
     */
    public function create_ValidRequirements_TagIsCreated()
    {
        // Arrange
        $factoryTag = factory(Tag::class)->make();
        $inputs = array(
            'name' => $factoryTag->name,
            'priority' => $factoryTag->priority,
            'color' => $factoryTag->color
        );

        // Act
        $this->createTagService->create($inputs);

        // Assert
        $this->assertDatabaseHas('tags', $inputs);
    }
}
