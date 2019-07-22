<?php

namespace App\Services;

use App\Project;

class ProjectTagService {

    /**
     *  Contructor
     *
     *  @param
     *  @return void
     */
    public function __construct() {

    }

    /**
     *  Attach a tag to a project
     *
     *  @param  int     id of project
     *  @param  [int]   ids ot tags
     *  @return []      array of 'attached', 'detached', 'changed'
     */
    public function attach($id) {

        // $project = Project::find($id);
        // $project->hidden = !$project->hidden;
        // return $project->save();

    }


}