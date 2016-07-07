@extends('master')

@section('title', 'New World')

@section('content')
	@foreach($articales as $articale)
		<h2><a href="{{ route('articale.show', $articale->id) }}">{{ $articale->title }}</a></h2>
		<p>{{ $articale->post }}</p>
	@endforeach
@stop


