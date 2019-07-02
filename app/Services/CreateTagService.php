<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

use App\Tag;

class CreateTagService {

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
     *  @param
     *  @return void
     */
    public function create($inputs) {

        $tag = new Tag;
        $tag->name = $inputs['name'];
        $tag->priority = $inputs['priority'];
        $tag->color = $inputs['color'];

        return $tag->save();

    }


}
