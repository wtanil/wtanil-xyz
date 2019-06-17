<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Contracts\ProjectInterface as Project;

class ProjectService {

    protected $project;

    /**
     *  Contructor
     *
     *  @param
     *  @return void
     */
    public function __construct(Project $project) {
        $this->project = $project;
    }

    /**
     *  Contructor
     *
     *  @param
     *  @return void
     */
    public function all() {
        if (Auth::check()) {
            return $projects = $this->project->all();
        } else {
            return $projects = $this->project->forPublic();
        }
    }




















}