<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
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
