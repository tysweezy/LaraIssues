<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

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
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @todo validate...throw http error when project does not save
     * @return Response
     */
    public function storeProject(Request $request)
    {
        $project = Project::create($request->all());

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
        //
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
