@extends('master')

@section('content')
<h1>Login Form</h1>
<hr>
@if(session('status'))
  <div class="alert alert-success" role="alert">
    <strong>{{ session('status') }}!</strong>
  </div>
@endif
<form role="form" action="{{ url('/login') }}" method="POST">
	{{ csrf_field() }}
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@stop