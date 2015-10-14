@extends('layout.default')


@section('content')

@include('errors')

<form method="POST" action="/auth/login">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group">
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div class="form-group">
        <button type="submit">Login</button>
    </div>
</form>

@stop