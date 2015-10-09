@extends('layout.default')

@section('content')

  <h1>{{ $case->subject }}</h1>

  <p>{{ $case->description }}</p>

@stop