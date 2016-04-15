@extends('layouts.app')

@section('content')
	<h2>Who to send it to ?</h2>
	<hr>
	<div class="row">
		<a href="{{ url('send/'.$email->id) }}" class="btn btn-primary pull-right">Send to a client</a>
	</div>
	<br>
	<div class="row">
		<table id="clients_table" class="table">
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