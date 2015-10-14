<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    protected $table = 'issues';

    protected $fillable = ['subject', 'description', 'projects_id'];

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }
  

    // comments belong in User -- whenever that gets created.
} 

