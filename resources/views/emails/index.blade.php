@extends('layouts.app')

@section('content')
	<h2> All Emails:</h2>
	<hr>
	<div class="row">
	<a href="{{ url('emails/create') }}" class="btn btn-primary pull-right">Create a new email</a>
	</div>
	<br>
	<div class="grid">
		<div class="grid-sizer"></div>
		<ul class="grid effect-4" id="grid">
		@foreach($emails as $email)
			<li>
				<a class="grid-item" href="{{ url('emails/'.$email->id)}}">
					<img src="{{ url($email->path_thumbnail) }}">
				</a>
			</li>
		@endforeach
		</ul>
	</div>
@stop