@extends('layouts.app')

@section('content')
<h2>Make new email:</h2>
<hr>
<!-- action="{{ url('/emails') }}" method="POST"-->
<form v-on:submit="loading_button" action="{{ url('/emails') }}" method="POST">
 	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label for="subject">Email subject:</label>
				<input type="text" class="form-control" name="subject">
			</div>
		</div>
	</div>
	<div class="row">
		<textarea id="summernote" name="content"></textarea>
	</div>
	<button type='submit' v-bind:class="{ 'disabled': is_disabled }" class='btn btn-primary btn-lg'>Create email</button>
</form>
@stop