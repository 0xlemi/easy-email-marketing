@extends('layouts.app')

@section('content')
<h2>Who to send it to ?</h2>
<hr>
<br>
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