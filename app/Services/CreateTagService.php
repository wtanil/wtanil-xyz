<?php

namespace App\Services;

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
     *  @param  [:] inputs  array of inputs
     *  @return boolean true if creation is successful
     */
    public function create($inputs) {

        $tag = new Tag;
        $tag->name = $inputs['name'];
        $tag->priority = $inputs['priority'];
        $tag->color = $inputs['color'];

        return $tag->save();

    }


}
