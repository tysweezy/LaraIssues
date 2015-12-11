@extends('layout.default')

@section('content')

 
<div class="row">
  
 <div class="col-md-6">
  <h1>Projects</h1>
 </div>

  @if(Auth::check())
    <a href="/project/create" class="btn btn-sm btn-success pull-right">New Project</a>
  @endif 
</div>


<div class="row">
  @foreach( $projects as $project )
      <div class="col-md-4">


      <a class="project-box" href="{{ url( $project->project_name ) }}">{{ $project->project_name }}</a>

      </div>
  @endforeach
</div>
</body>

@stop