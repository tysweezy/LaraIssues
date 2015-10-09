<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Issues;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Input;
use Validator;

class IssuesController extends Controller 
{

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function createIssue(Project $project,$project_name)
    {
        $project = $project->getProjectname($project_name);

        return view('issue.create')->with('project', $project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function storeIssue(Project $project, $project_name)
    {
        $project = $project->getProjectname($project_name);

        // todo: refactor validation -- perhaps use a request instead.
    

        $validation = Validator::make(Input::all(), [
            'subject'     => 'required',
            'description' => 'required'  
        ]);

        // validation logic
        if ($validation->fails()) {
            // do something
            return redirect($project->project_name . '/issue/create')
                        ->withErrors($validation)
                        ->withInput();
        }

        $issue = new Issues;

        $issue->subject       = Input::get('subject');
        $issue->description   = Input::get('description');
        $issue->project_id    = $project->id;

        $issue->save();


        // Issue::create() is out of scope???
        /*Issues::create([
            'subject'      => Input::get('subject'),
            'description'  => Input::get('description'),
            'project_id'   => $project->id 
        ]);*/

        return redirect($project->project_name);
    }

    /**
     * Display the specified resource. 
     * Instead of issue id...cases start 1
     *
     * @param  string $project_name int $case
     * @return Response
     */
    public function showIssue(Project $project, $project_name, $case)
    {
        $project =  $project->getProjectname($project_name);

        $case = $project->issues()->where('id', '=', $case)->first();

        if ( ! count($case) ) {
            abort(404);
        }

        return view('issue.single')->with('case', $case);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function editIssue($id)
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
    public function updateIssue(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroyIssue($id)
    {
        //
    }


   //------------- API 

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($project_name)
    {
        $project = Project::where('project_name', '=', $project_name)->first();

        //$issues = Issues::where('project_id', '=', $project->id)->get();

        if (! count($project) ) {
            abort(404);
        }        
    

        return response()->json([
            $project,
            'issues' => $project->issues()->get()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource. 
     * Instead of issue id...cases start 1
     *
     * @param  int  $project_name $case
     * @return Response
     */
    public function show($project_name, $case)
    {
        $project = Project::where('project_name', '=', $project_name)->first();

        $case = $project->issues()->where('id', '=', $case)->get();

        if ( ! count($case) ) {
            abort(404);
        }

        return response()->json([
            $case
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
