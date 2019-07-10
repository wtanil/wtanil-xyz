<?php

namespace App\Services;

use App\Tag;

class TagQueryService {

    /**
     *  Contructor
     *
     *  @param
     *  @return void
     */
    public function __construct() {

    }


    /**
     *  Get all tags
     *
     *  @param  
     *  @return Collection 
     */
    public function getAll() {

        return Tag::orderBy('priority')->orderBy('name')->get();
        

    }


}
