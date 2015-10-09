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

    
    public function getProjectname($projectname)  
    {
        $projectname = $this->where('project_name', '=', $projectname)->first();

        return $projectname;
    }
}
