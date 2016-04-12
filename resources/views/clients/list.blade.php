@extends('layouts.app')

@section('content')
<h2>All the clients:</h2>
<hr>
<div class="row">
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
	</table>
</div>
@stop