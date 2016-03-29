@extends('layout.default')

@section('content')

  <h1>{{ $case->subject }}</h1>  

<div class="row pull-right">
  

  <div class="col-md-12">
    <strong>Tags</strong>

    <ul>
      @foreach($issue->tags as $tag) 
        <li class="label label-default">{{ $tag->tag_name }}</li>
      @endforeach
    </ul>

    

  @if (Auth::check())
   @if(Auth::user()->email == 'tyler@decipherinc.com')
    <strong>Create new tag</strong>

    @include('errors')
    @include('session')
    <form action="/tag/create" method="post">
      {!! csrf_field() !!}

      <input type="text" name="tag_name" placeholder="Tag Name">
      <input type="submit" value="New Tag">
    </form>
    @endif
  @endif  
  </div>
</div>  


<div class="row">
  <div class="col-md-12">
    @if(count($user) == 0)
      <p>Submitted By: Anonymous</p>
    @else
      <p>Submitted By: <a href="#">{{ $user->name }}</a></p>
    @endif

    <p>{{ $case->description }}</p>
  </div>
</div>

@stop