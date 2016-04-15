@extends('layouts.app')

@section('content')
<h2>All the clients:</h2>
<hr>
<div class="row">
	<a href="{{ url('clients/create') }}" class="btn btn-primary pull-right">Create a new clients</a>
</div>
<br>
<div class="row">
	<table id="clients_table" class="table">
		<thead>
            <tr>
                <th>#</th>
				<th>Company name</th>
				<th>Email</th>
				<th>Full Name</th>
				<th>Group Name</th>
				<th>Respon.</th>
				<th>Suscr.</th>
            </tr>
        </thead>
        <tbody>
			@foreach ($clients as $client)
				<tr>
					<td>{{ $client->id }}</td>
					<td>{{ $client->company }}</td>
					<td>{{ $client->email }}</td>
					<td>{{ $client->name." ".$client->last_name }}</td>
					<td>{{ $client->group->name }}</td>
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