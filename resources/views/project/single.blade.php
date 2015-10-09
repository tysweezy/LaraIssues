@extends('layout.default')

@section('content')
  <h2>{{ $project->project_name }}</h2>

 <a href="/{{ $project->project_name }}/issue/create">Submit Issue</a>
  <h3>Outstanding Issues</h3>

  <ul>
    @foreach($issues as $issue)
      <li><a href="{{ $project->project_name }}/issue/{{ $issue->id }}">{{ $issue->subject }}</a></li>

    @endforeach
  </ul>
@stop