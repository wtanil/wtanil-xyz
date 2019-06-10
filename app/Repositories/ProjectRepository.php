<?php

namespace App\Repositories;

use App\Contracts\ProjectInterface;
use App\Project;

class ProjectRepository implements ProjectInterface {

	/**
	*   Get all projects
	*
	*	@param 	int $id
	*   @return Collections
	*/
	public function all($id = null) {

		if ($id == null) {
			return Project::where('hidden', false)->orderBy('started_date', 'desc')->get();
		}

		return Project::orderBy('started_date', 'desc')->get();
	}

}