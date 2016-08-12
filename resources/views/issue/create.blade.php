@extends('layout.default')

@section('content')
 
<h2>Submit Issue</h2>

@include('errors')

@if( ! Auth::check() )
  <div class="alert alert-info">
    You are submitting an issue as an anonymous user.
  </div>
@endif

  <form action="/{{ $project->project_slug }}/issue/create" method="post">

    {!! csrf_field() !!}

    <div class="form-group"> 
     <label for="subject">Subject</label>
     <input type="text" name="subject" placeholder="Subject" class="form-control"> 
    </div>

    @if( ! Auth::check() )
      <div class="form-group">
        <label for="anon_email">Enter Your Email for Updates (Optional)</label>
        <input type="email" name="anon_email" placeholder="Your Email" class="form-control">
      </div>
    @endif

    <div class="form-group">
     <label for="description">Description</label>
     <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Submit Issue">
    </div>
  </form>
@stop