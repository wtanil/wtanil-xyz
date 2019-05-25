<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Repositories\ProjectRepository;

class ProjectTest extends TestCase {

	use RefreshDatabase;

    /**
     *  @test
     *	@group ProjectRepository
     * 	@return void
     */
    public function All_NoProject_ReturnEmpty() {

    	// Given There is no project
    	// When 
    	// Then Empty collection is returned
    	$projectRepo = New ProjectRepository;
    	$emptyCollection = $projectRepo->all();

    	$this->assertCount(0, $emptyCollection);

    }

	/**
	 *  @test
     *	@group ProjectRepository
     * 	@return void
     */
    public function All_WithProjects_ReturnAllProjects() {

    	// Given There is 5 projects
    	// When 
    	// Then Returned collection has 5 items
    	$projectRepo = New ProjectRepository;

    	$projects = factory(App\Project::class, 5)->create();

    	$result = $projectRepo->all();

    	$this->assertCount(5, $result);


    }










}
