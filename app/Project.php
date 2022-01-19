<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    /**
     * Get the images for the project
    */
    public function images() {

        return $this->hasMany('App\Image', 'project_id', 'id');

    }

    /**
     * Get the thumbnail for the project
    */
    public function thumbnail() {

        // return $this->belongsTo('App\Image', 'thumbnail_id', 'id');

        return $this->hasOne('App\Image', 'id', 'thumbnail_id');

    }

    /**
    * Get the short description for the project
    */
    public function getShortDescription() {
        return Str::limit($this->description, 150, '...');
    }
}
