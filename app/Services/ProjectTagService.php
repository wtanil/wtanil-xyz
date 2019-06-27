<?php

namespace App\Services;

use App\Project;

class ProjectTagService {

    /**
     *  Attach/Detach tags as necessary to a project and return the changes
     *
     *  @param  $id
     *  @return $changes    ['attached'=>[],'detached'=>[],'updated'=>[]];
     */
    public function sync($projectId, $tagId)
    {
        return Project::find($projectId)->tags()->sync($tagId);
    }

}