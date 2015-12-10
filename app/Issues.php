<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    protected $table = 'issues';

    protected $fillable = ['subject', 'description', 'projects_id', 'user_id'];

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }
  

    /**
     * Issue belongs to user
     * 
     * @return relationship
     */
    public function user()
    {
      return $this->belongsTo('App\User');
    }
} 

