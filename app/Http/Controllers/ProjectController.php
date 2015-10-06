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
    public function showProject(Response $response, $project_name)
    {
        $project = Project::where('project_name', '=', $project_name)->first(); 

        $issues = $project->issues()->get();

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

   // ------- API 

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Project::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @todo validate...throw http error when project does not save
     * @return Response
     */
    public function store(Request $request)
    {
        $project = Project::create($request->all());

        $project->save();

        return response()->json([
            $project,
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @todo show all issues tied to this project
     * @return Response
     */
    public function show(Response $response, $project_name)
    {
        $project = Project::where('project_name', '=', $project_name)->first(); 

        if ( ! count($project) ) {

            return response()->json([
                'status_code' => 404,
                'message'     => 'project does not exist'
            ], 404);
        } 

        return response()->json([
            $project,
            'status_code' => $response->status()
        ], 200);
    }


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
