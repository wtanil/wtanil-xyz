<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'priority', 'color'];

    /**
     * Get all of the projects that are assigned this tag
     */
    public function projects()
    {
        return $this->morphedByMany('App\Project', 'taggable');
    }
    
}
