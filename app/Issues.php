<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class issues extends Model
{
    protected $table = 'issues';

    protected $fillable = ['subject', 'description', 'project_id'];

    public function project()
    {
    	return s$this->belongsTo('App\Project');
    }
}
