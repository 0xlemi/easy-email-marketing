@extends('layouts.app')

@section('content')
	<h2>All the Groups:</h2>
	<hr>
	<div class="row">
		<a href="{{ url('groups/create') }}" class="btn btn-primary pull-right">Create a new group</a>
	</div>
	<br>
	<div class="row">
		<table id="groups_table" class="table">
			<thead>
	            <tr>
	                <th>#</th>
					<th>Name</th>
					<th>Num. Clients</th>
	            </tr>
	        </thead>
	        <tbody>
				@foreach ($groups as $group)
					<tr>
						<td>{{ $group->id }}</td>
						<td>{{ $group->name }}</td>
						<td>{{ $group->number_of_clients() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop