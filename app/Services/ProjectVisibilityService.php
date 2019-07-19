<?php

namespace App\Services;

use App\Project;

class ProjectVisibilityService {

    /**
     *  Contructor
     *
     *  @param
     *  @return void
     */
    public function __construct() {

    }

    /**
     *  Toggle project visibility
     *
     *  @param  int     id of project
     *  @return boolean true if creation is successful
     */
    public function toggleVisibility($id) {

        $project = Project::find($id);
        $project->hidden = !$project->hidden;
        return $project->save();

    }



}