<?php

namespace App\Services;

use App\Project;

class CreateProjectService {

    /**
     *  Contructor
     *
     *  @param
     *  @return void
     */
    public function __construct() {

    }


    /**
     *  Create a tag
     *
     *  @param  [:] inputs  array of inputs
     *  @return boolean true if creation is successful
     */
    public function create($inputs) {

        $project = new Project;
        $project->name = $inputs['name'];
        $project->description = $inputs['description'];
        $project->hidden = $inputs['hidden'];
        $project->start_date = $inputs['start_date'];
        $project->last_update_date = $inputs['last_update_date'];

        return $project->save();

    }


}
