@extends('layout.default')

@section('content')

<div class="row">  
  
  <div class="col-md-6">
    <h2>{{ $project->project_name }}</h2>
  </div>

  <a href="/{{ $project->project_name }}/issue/create" class="btn btn-success pull-right">New Issue</a>

</div>


<div class="panel panel-default">
  <div class="panel-heading">Current Issues</div>
  <div class="panel-body">

  @if(count($issues) == 0)
    <p>There are currently no known issues in this project</p>
  @endif

    <ul>
      @foreach($issues as $issue)
        <li>

          <a href="/{{ $project->project_name }}/issue/{{ $issue->id }}">{{ $issue->subject }}</a>
            
          <p>
            #{{ $issue->id }} opened on {{ $issue->created_at->format('m/d/Y') }}

            by 
              
            @if (count($issue->user))
              {{ $issue->user->name }}
            @else
              Anonymous
            @endif 
            
          </p>
        </li>
      @endforeach
    </ul>
  </div>
</div>
@stop