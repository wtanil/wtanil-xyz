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
     *  Delete a tag or tags
     *
     *  @param  int|[INT]   id or ids of tag(s)
     *  @return int         number of model deleted
     */
    public function delete($id) {

        $count = Tag::destroy($id);

        return $count;
    }


}
