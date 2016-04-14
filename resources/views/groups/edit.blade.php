@extends('layouts.app')

@section('content')
 <h3>Edit group:</h3>
 <hr>
<form v-on:submit="loading_button" action="{{ url('/groups/'.$group->id) }}" method="POST">
	{{ method_field('PUT') }}
 	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label for="name">Group name:</label>
				<input type="text" name="name" class="form-control" value="{{ $group->name }}">
			</div>
		</div>
	</div>
	<div class="row">
		<a class="pull-right btn btn-link"
	    	href="{{ url('/groups/'.$group->id) }}">View Group</a>
	</div>
	<div class="row">
		<h4>Click on clients to kick them out of the group:</h4>
		<hr>
		<table id="group_clients_table" class="table">
			<thead>
		        <tr>
		            <th>#</th>
					<th>Company name</th>
					<th>Email</th>
					<th>Full Name</th>
					<th>Show</th>
					<th>Kick out</th>
		        </tr>
		    </thead>
		    <tbody>
				@foreach ($group->clients as $client)
					<tr>
						<td>{{ $client->id }}</td>
						<td>{{ $client->company }}</td>
						<td>{{ $client->email }}</td>
						<td>{{ $client->name." ".$client->last_name }}</td>
						<td><a href="{{ url('clients/'.$client->id) }}" class="btn btn-primary btn-xs">show client</a></td>
						<td><a href="{{ url('groups/'.$group->id.'/client/'.$client->id) }}" class="btn btn-danger btn-xs">kick client</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<br>
	<button type='submit' v-bind:class="{ 'disabled': is_disabled }" class='btn btn-primary btn-lg'>Update group</button>
</form>
@stop