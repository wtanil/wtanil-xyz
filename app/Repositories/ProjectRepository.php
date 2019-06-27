<?php

namespace App\Repositories;

use App\Contracts\ProjectInterface;
use App\Project;

class ProjectRepository implements ProjectInterface {

	/**
	 *  Get all projects
	 *
	 *	@param 
	 *  @return 
	 */
	public function all()
    {

    	return Project::orderBy('started_date', 'desc')->with('tags:tags.id,name,priority,color')->get();
	}

    /**
     *  Get all publicly available projects
     *
     *  @param
     *  @return
     */
    public function forPublic()
    {

        return Project::where('hidden', false)->orderBy('started_date', 'desc')->with('tags:tags.id,name,priority,color')->get();

    }

}