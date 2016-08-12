<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Project;
use App\Issues;
use App\Tags;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

use Input;
use Validator;
use Auth;
use Mail;

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
            return redirect($project->project_path . '/issue/create')
                        ->withErrors($validation)
                        ->withInput();
        }

        $issue = new Issues;

        $issue->subject       = Input::get('subject');
        $issue->description   = Input::get('description');
        $issue->status        = 'open';
        $issue->project_id    = $project->id; 

        // check if user is authenticated -- then store user id
        if (Auth::check()) {
            $issue->user_id = Auth::user()->id;
        } 

        // default user_id will store to 0? 0 will be anon
        // @todo write better way to check if user is anon
        if ( ! Auth::check() ) {
            $issue->user_id = 0;
        }

        $issue->save();

        // will remove when I interact with actual data
        $data = [];

        // send mail to my personal email once ussue has been created
        Mail::send('emails.issue', $data, function($m) {
            $m->from('issue@email.com', 'Issue Reporter');

            $m->to('tyler@decipherinc.com','Tyler Souza')->subject('New Issue Reported');
        });
       

        return redirect($project->project_slug); 
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

        // $tags = Tags::all();

        $case = $project->issues()
                        ->where('id', '=', $case)
                        ->first();

        $issue = Issues::find($case->id);

        /* foreach ($issue->tags as $tag) {
            dd($tag->tag_name);
        }*/                   

        $user = User::find($case->user_id);
            
        if ( ! count($case) ) {
            abort(404);
        }

        return view('issue.single')->with('case', $case)->with('user', $user)->with('issue', $issue);
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
    public function updateIssue(Project $project, $project_name, $case)
    {   
        $project = $project->getProjectname($project_name);

        $validation = Validator::make(Input::all(), [
            'subject'     => 'required',
            'description' => 'required'  
        ]);

        $case = $project->issues()
                        ->where('id', '=', $case)
                        ->first();

        if ( $validation->fails() ) {
            // handle validation
        }
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

    // tags methogs -- might extract to own controller later
      // two methods. 1.) for creating tag. 2.) for assigning tag to issue
    /**
     * Create a new tag -- POST
     * 
     * @return response
     */
    public function createTag()
    {
        /** $tag = new Tags;
        $tag->tag_name = Input::get('tag_name');
        $tag->save(); **/

        $validation = Validator::make(Input::all(), [
            'tag_name'  => 'required'
        ]);

        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        // reduce code to one line
        Tags::create(['tag_name' => Input::get('tag_name')]); 

        // redirect to previous location for now
        return back()->with('success', 'Tag created!');
    }

    /**
     * assign a tag to an issue -- POST
     * 
     * @return reponse
     */
    public function assignTag()
    {
        // grab project name and issue id
         // get tag 
        // attach tag to issue
    }

}
