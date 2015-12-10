@extends('layout.default')

@section('content')

  <h1>Projects</h1>

<div class="row">
  @foreach( $projects as $project )
      <div class="col-md-4">


      <a class="project-box" href="{{ url( $project->project_name ) }}">{{ $project->project_name }}</a>

      </div>
  @endforeach
</div>
</body>

@stop