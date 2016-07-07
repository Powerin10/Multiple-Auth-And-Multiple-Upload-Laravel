@extends('master')

@section('title', 'Form')

@section('content')
	{{ session('status') }}

	<h1>Write a New Article</h1>
	<hr>

	<form action="{{ route('articale.store') }}" method="POST" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="form-group">
		<label> Title </label>
		<input type="text" name="title" class="form-control">
	</div>

	<div class="form-group">
		<label> Post </label>
		<textarea name="post" class="form-control" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<label> Upload 1 </label>
		<input type="file" name="up1[]" class="form-control">
	</div>

	<div class="form-group">
		<label> Upload 1 </label>
		<input type="file" name="up1[]" class="form-control">
	</div>

	<div class="form-group">
		<input type="Submit" class="btn btn-default" value="Submit">
	</div>
	</form>

	@if($errors->any())
		<ul class="alert alert-danger">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
@stop