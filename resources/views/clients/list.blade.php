@extends('layout.app')

@section('content')
<h1>All the clients:</h1>
<hr>
<div class="row">
	<table id="table_id" class="table table-hover">
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