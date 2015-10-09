@extends('layout.default')

@section('content')
 
  <h2>Submit Issue</h2>


  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach 
      </ul>  
    </div>
  @endif

  <form action="/{{ $project->project_name }}/issue/create" method="post">

    {!! csrf_field() !!}

    <div class="form-group"> 
     <label for="subject">Subject</label>
     <input type="text" name="subject" placeholder="Subject" class="form-control"> 
    </div>

    <div class="form-group">
     <label for="description">Description</label>
     <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Submit Issue">
    </div>
  </form>
@stop