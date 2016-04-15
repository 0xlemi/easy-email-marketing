@extends('layouts.app')

@section('content')
	<h3>Review before sending</h3>
	<br>
	<div class="row">
		<div class="col-md-8">
			<table id="group_review_clients_table" class="table">
				<thead>
		            <tr>
		                <th>#</th>
						<th>Company name</th>
						<th>Email</th>
						<th>Full Name</th>
		            </tr>
		        </thead>
		        <tbody>
					@foreach ($group->clients as $client)
						<tr>
							<td>{{ $client->id }}</td>
							<td>{{ $client->company }}</td>
							<td>{{ $client->email }}</td>
							<td>{{ $client->name." ".$client->last_name }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
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
			<a href="{{ url('send/group/'.$email->id.'/'.$group->id) }}" class="btn btn-primary btn-lg btn-block">Send Now</a>
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