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
    public function getAll()
    {

        return Project::orderBy('start_date', 'desc')->with('tags')->get();

    }

    /**
     *  Get all not hidden projects
     *
     *  @param  
     *  @return Collection 
     */
    public function forPublic()
    {

        return Project::with(['tags', 'thumbnail'])->where('hidden', false)->orderBy('start_date', 'desc')->get();
    }

    /**
     *  Get project by ID
     *
     *  @param  int ID
     *  @return Model 
     */
    public function forId($id)
    {

        return Project::with(['tags', 'images'])->find($id);
    }

    /**
     *  Get project by slug
     *
     *  @param  String slug
     *  @return Model 
     */
    public function forSlug($slug)
    {

        return Project::with(['tags', 'images'])->where('slug', $slug)->first();
    }


}
