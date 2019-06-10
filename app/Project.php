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
    protected $fillable = ['user_id', 'name', 'description', 'hidden', 'started_date', 'last_update_date'];


     /**
     * Get the user that owns the projects.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
