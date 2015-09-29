<?php

namespace App;

use App\Issues;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = ['project_name'];

    /* public function __construct(Model $model)
    {
      $this->model = $model;
    } */

    public function issues() 
    {
    	$this->hasMany('App\Issues');
    }

    /**
     * Count the number issues
     * 
     * @return int
     */ 
    public function issueCount($project_id) 
    {
      $issues = Issues::where('project_id', '=', $project_id)->get(); 

      if ( ! count($issues) ) {
        return abort(404);
      } 
     
      return count($issues);
    }

}
