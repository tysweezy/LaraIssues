@extends('layout.default')

@section('content')
  
  <h2>Create New Project</h2>

  @include('errors')

  <form action="/project/create" method="post">
    {!! csrf_field() !!}

    <div class="form-group">
      <label for="project_name">Project Name</label>
      <input type="text" name="project_name" placeholder="Name of Project" class="form-control">
    </div>

    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Create Project">
    </div>
  </form>

@stop