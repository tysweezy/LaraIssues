@extends('layout.default')

@section('content')
  <h2>{{ $project->project_name }}</h2>


  <h3>Outstanding Issues</h3>

  <ul>
    @foreach($issues as $issue)
      <li>{{ $issue->subject }}</li>

    @endforeach
  </ul>
@stop