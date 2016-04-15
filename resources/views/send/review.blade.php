@extends('layouts.app')

@section('content')
	<h3>Review before sending</h3>
	<br>
	<div class="row">
		<div class="col-md-6">
				<div class="panel panel-default">
		            <div class="panel-heading">
		              <h3 class="panel-title">Client info:</h3>
		            </div>
			        <div class="panel-body">
						<div class="col-md-6">
							<h4>Company:</h4>
							<h4>Full name:</h4>
							<h4>Email:</h4>
							<h4>Has responded?</h4>
							<h4>Is suscribed?</h4>
							<h4>Created at:</h4>
							<h4>Times sent:</h4>
						</div>
						<div class="col-md-6">
							<h4><small>{{ $client->company }}</small></h4>
							<h4><small>{{ $client->name.' '.$client->last_name }}</small></h4>
							<h4><small>{{ $client->email }}</small></h4>
							<h4>
								<small>
									<span class="label label-{{ ($client->has_responded) ? 'success' : 'danger' }}">
										{{ ($client->has_responded) ? 'Yes' : 'No' }}
									</span>
								</small>
							</h4>
							<h4>
								<small>
									<span class="label label-{{ ($client->is_suscribed) ? 'success' : 'danger' }}">
										{{ ($client->is_suscribed) ? 'Yes' : 'No' }}
									</span>
								</small>
							</h4>
							<h4><small>{{ $client->created_at }}</small></h4>
							<h4><small>{{ $client->transactions->count() }}</small></h4>
						</div>
					</div>
		        </div>
		</div>
		<div class="col-md-6">
			<br>
			<div class='form-group'>
				<label>Email Name:</label>
				<input type='text' class='form-control' value="{{ $email->name }}" disabled>
			</div>
			<div class='form-group'>
				<label>Subject:</label>
				<input type='text' class='form-control' value="{{ $email->subject }}" disabled>
			</div>
			<br>
			<a href="{{ url('send/'.$email->id.'/'.$client->id) }}" class="btn btn-primary btn-lg btn-block">Send Now</a>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-default">
		    <div class="panel-heading">
		      	<h3 class="panel-title">Email to send</h3>
		    </div>
		    <div class="panel-body">
		    	<img src="{{ url($email->path_thumbnail) }}">
			</div>
		</div>
	</div>
@stop