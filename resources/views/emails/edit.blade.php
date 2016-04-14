@extends('layouts.app')

@section('content')
	<h3>Edit Email:</h3>
	<hr>
	<form v-on:submit="loading_button" action="{{ url('/emails/'.$email->id) }}" method="POST">
		{{ method_field('PUT') }}
	 	{{ csrf_field() }}
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" class="form-control" name="name" value="{{ $email->name }}">
				</div>
				<div class="form-group">
					<label for="subject">Email subject:</label>
					<input type="text" class="form-control" name="subject" value="{{ $email->subject }}">
				</div>
			</div>
		</div>
		<div class="row">
			<a class="pull-right btn btn-link"
	    		href="{{ url('/emails/'.$email->id) }}">View Email</a>
		</div>
		<div class="row">
			<a-scene v-pre>
				<textarea id="summernote" name="content">{{ $content }}</textarea>
			</a-scene>
		</div>
		<button type='submit' v-bind:class="{ 'disabled': is_disabled }" class='btn btn-primary btn-lg'>Update email</button>
	</form>
@stop