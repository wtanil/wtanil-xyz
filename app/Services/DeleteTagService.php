<?php

namespace App\Services;

use App\Tag;

class DeleteTagService {

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
     *  @param  int     id of tag
     *  @return int     number of model deleted
     */
    public function delete($id) {

        $count = Tag::destroy($id);

        return $count;
    }


}
