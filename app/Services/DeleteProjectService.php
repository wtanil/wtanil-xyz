<?php

namespace App\Services;

use App\Project;

class DeleteProjectService {

    /**
     *  Contructor
     *
     *  @param
     *  @return void
     */
    public function __construct() {

    }


    /**
     *  Delete a project or projects
     *
     *  @param  int|[INT]   id or ids of project(s)
     *  @return int         number of model deleted
     */
    public function delete($id) {

        $count = Project::destroy($id);

        return $count;
    }


}