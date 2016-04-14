@extends('layouts.app')

@section('content')
	<h2>Add new group:</h2>
	<hr>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form v-on:submit="loading_button" action="{{ url('/groups') }}" method="POST">
				{{ csrf_field() }}
				<div class='form-group'>
					<label for='name'>Group name:</label>
					<input type='text' class='form-control' name='name' value="{{ old('name') }}">
				</div>
				<hr>
				<button type='submit' v-bind:class="{ 'disabled': is_disabled }" class='btn btn-primary btn-lg'>Create Group</button>
			</form>
		</div>
	</div>
@stop