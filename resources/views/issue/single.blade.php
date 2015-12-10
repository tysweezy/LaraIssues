@extends('layout.default')

@section('content')

  <h1>{{ $case->subject }}</h1>  

  @if(count($user) == 0)
    <p>Submitted By: Anonymous</p>
  @else
    <p>Submitted By: <a href="#">{{ $user->name }}</a></p>
  @endif

  <p>{{ $case->description }}</p>


@stop