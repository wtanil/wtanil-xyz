<?php

namespace App\Services;

use App\Project;

class ProjectQueryService {

    /**
     *  Contructor
     *
     *  @param
     *  @return void
     */
    public function __construct() {

    }


    /**
     *  Get all projects
     *
     *  @param  
     *  @return Collection 
     */
    public function getAll() {

        return Project::orderBy('start_date', 'desc')->get();

    }


}