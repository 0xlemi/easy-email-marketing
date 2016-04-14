@extends('layouts.app')

@section('content')
	<h3>Email info:</h3>
	<hr>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class='form-group'>
				<label>Name:</label>
				<input type='text' class='form-control' value="{{ $email->name }}" disabled>
			</div>
			<div class='form-group'>
				<label>Subject:</label>
				<input type='text' class='form-control' value="{{ $email->subject }}" disabled>
			</div>
		</div>
	</div>
	<div class="row">
	<a class="pull-right btn text-danger" 
				data-method="delete" 
				data-token="{{ csrf_token() }}" 
				href="{{ url('/emails/'.$email->id) }}">Delete Email</a>

	<a class="pull-right btn btn-link"
    	href="{{ url('/emails/'.$email->id.'/edit') }}">Edit Email</a>

    <a class="pull-right btn btn-link"
    	href="{{ url('/send/'.$email->id) }}">Send Email</a>
	</div>
	<div class="row">
		<div class="panel panel-default">
		    <div class="panel-heading">
		      	<h3 class="panel-title">Email Preview</h3>
		    </div>
		    <div class="panel-body">
		    	<img src="{{ url($email->path_thumbnail) }}">
			</div>
		</div>
	</div>
@stop