@extends('master')

@section('content')
<h1>Login Form</h1>
<hr>

@if(session('status'))
<div class="alert alert-success" role="alert">
  <strong>{{ session('status') }}</strong> 
</div>
@endif



<form role="form" action="{{ url('/register' )}}" method="POST">
	{{ csrf_field() }}
    <div class="form-group">
      <label for="Name">Name:</label>
      <input type="text" name="name" class="form-control" id="email" placeholder="Enter your Name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

@if($errors->any())
  @foreach($errors->all() as $error)
  <div class="alert alert-warning" role="alert">
      <strong>{{ $error }}!</strong>
  </div>
  @endforeach
@endif
@stop