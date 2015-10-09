@extends('layout.default')

@section('content')

  <h1>Projects</h1>



  @foreach( $projects as $project )
    <div><a href="{{ $project->project_name }}">{{ $project->project_name }}</a></div>    
  @endforeach
</body>

@stop