<?php

namespace App;

use App\Issues;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = ['project_name', 'projects_id'];


    public function issues() 
    {
    	return $this->hasMany('App\Issues');
    }

    /**
     * Count the number issues
     * 
     * @return int
     */ 
    public function issueCount() 
    {
      $issues = $this->issues();

      if ( ! count($issues) ) {
        return abort(404);
      } 
     
      return count($issues);
    }

}
