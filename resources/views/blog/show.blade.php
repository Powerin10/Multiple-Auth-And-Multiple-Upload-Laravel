@extends('master')

@section('title', 'Show')

@section('content')
	<h1>
		{{ $articales->title }}		
	</h1>
	<p>
		{{ $articales->post }}		
	</p>
@stop