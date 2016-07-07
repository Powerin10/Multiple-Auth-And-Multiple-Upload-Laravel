@extends('master')

@section('title', 'Edit')

@section('content')
	{{ session('status') }}
	
	<h1>
	{{ $articale->title }}
	</h1>
	<hr>

	<form action="{{ route('articale.update', $articale->id) }}" method="POST">
	<input name="_method" type="hidden" value="PATCH">
	{!! csrf_field() !!}
	<div class="form-group">
		<label> Title </label>
		<input type="text" name="title" value="{{ $articale->title }}" class="form-control">
	</div>

	<div class="form-group">
		<label> Post </label>
		<textarea name="post" class="form-control" cols="30" rows="10">{{ $articale->post }}</textarea>
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