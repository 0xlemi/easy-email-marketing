@extends('layouts.app')

@section('content')
	<h2> All Emails:</h2>
	<hr> <!-- data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 160, "gutter": 10 }' -->
	<div class="grid">
		<div class="grid-sizer"></div>
		@foreach($emails as $email)
		 	<a class="grid-item" href="{{ url('emails/'.$email->id)}}">
		  		<img src="{{ url($email->path_thumbnail) }}">
		 	</a>
		@endforeach
	</div>
@stop