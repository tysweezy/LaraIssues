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


 @if( count($projects) == 0 ) 
    <div class="alert alert-info"> There are no projects that I'm currently working on. </div>
  @endif  

<div class="row">
  @foreach( $projects as $project )
      <div class="col-md-4">


      <a class="project-box" href="{{ $project->project_slug }}">{{ $project->project_name }}</a>

      </div>
  @endforeach
</div>
</body>

@stop