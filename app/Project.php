<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'hidden', 'start_date', 'last_update_date'];

    /**
     * Get all of the tags for the project
     */
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
