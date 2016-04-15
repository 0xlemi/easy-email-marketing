@extends('layouts.app')

@section('content')
	<h3>Groups info:</h3>
	<hr>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<label>Group name:</label>
				<input type="text" class="form-control" value="{{ $group->name }}" disabled>
			</div>
		</div>
	</div>
	<div class="row">
		<a class="pull-right btn text-danger" 
					data-method="delete" 
					data-token="{{ csrf_token() }}" 
					href="{{ url('/groups/'.$group->id) }}">Delete Group</a>

		<a class="pull-right btn btn-link"
	    	href="{{ url('/groups/'.$group->id.'/edit') }}">Edit Group</a>
	</div>
	<div class="row">
	<h4>List of clients of this group:</h4>
	<hr>
		<table id="clients_table" class="table">
			<thead>
	            <tr>
	                <th>#</th>
					<th>Company name</th>
					<th>Email</th>
					<th>Full Name</th>
					<th>Respon.</th>
					<th>Suscr.</th>
	            </tr>
	        </thead>
	        <tbody>
				@foreach ($group->clients as $client)
					<tr>
						<td>{{ $client->id }}</td>
						<td>{{ $client->company }}</td>
						<td>{{ $client->email }}</td>
						<td>{{ $client->name." ".$client->last_name }}</td>
						<td>
							<span class="label label-{{ ($client->has_responded) ? 'success' : 'danger' }}">
								{{ ($client->has_responded) ? 'Yes' : 'No' }}
							</span>
						</td>
						<td>
							<span class="label label-{{ ($client->is_suscribed) ? 'success' : 'danger' }}">
								{{ ($client->is_suscribed) ? 'Yes' : 'No' }}
							</span>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop