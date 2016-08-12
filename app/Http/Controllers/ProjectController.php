<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Validator;
use Input;

class ProjectController extends Controller
{

    // note: Api methods on top...then core app methods following


    // fuck it -- adding core methods...api later
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getAll()
    {
        $projects = Project::all();

        return view('project.all')->with('projects', $projects);
    }


    /**
     * create project form
     * 
     * @return response
     */
    public function createProject() 
    {
        return view('project.create');
    } 


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @todo validate...throw http error when project does not save
     * @return Response
     */
    public function storeProject(Request $request)
    {

        $validator = Validator::make(Input::all(), [
            'project_name'  => 'required' 
        ]);

        if ($validator->fails()) {
            return redirect('/project/create')->withErrors($validator); 
        }

        $project = Project::create([
            'project_name'  => $request->input('project_name'),
            
        ]);

        $project->project_slug = str_slug($project->project_name, '-');

        $project->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @todo show all issues tied to this project
     * @return Response
     */
    public function showProject(Project $project, $project_name)
    {

        $project = $project->getProjectname($project_name); 

        $issues = $project->issues()->orderBy('id', 'DESC')->get();

        if ( ! count($project) ) {

          return abort(404);
        } 

        return view('project.single')
                ->with('project', $project)
                ->with('issues', $issues); 
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function editProject($id)
    {
        // some todos
            // 1. make sure project is owned by owner (user who created the project)
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function updateProject(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroyProject($id)
    {
        //
    }

  
}
