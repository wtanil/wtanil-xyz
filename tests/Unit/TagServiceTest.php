<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\TagService;
use App\Contracts\TagInterface;

class TagServiceTest extends TestCase
{
    protected $tagService;
    protected $tagRepoMock;

    protected function setUp(): void
    {

        parent::setUp();

        $this->tagRepoMock = $this->mock(TagInterface::class);
        $this->tagService = $this->app->make(TagService::class);

    }

    /**
     *  @test
     *  @group TagService
     */
    public function All__()
    {
        // Arrange
        $this->tagRepoMock->shouldReceive('all')->once();

        // Act
        $this->tagService->all();

        // Assert
    }


}
