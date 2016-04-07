@extends('layout.app')

@section('content')
	<h1>Add new client:</h1>
	<hr>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form action="{{ url('/clients') }}" method="POST">
				{{ csrf_field() }}
				<div class='form-group'>
					<label for='name'>Name:</label>
					<input type='text' class='form-control' name='name' value="{{ old('name') }}">
				</div>
				<div class='form-group'>
					<label for='last_name'>Lastname:</label>
					<input type='text' class='form-control' name='last_name' value="{{ old('last_name') }}">
				</div>
				<div class='form-group'>
					<label for='email'>Email:</label>
					<input type='email' class='form-control' name='email' required value="{{ old('email') }}">
				</div>
				<div class='form-group'>
					<label for='company'>Company name:</label>
					<input type='text' class='form-control' name='company' required value="{{ old('company') }}">
				</div>
				<div class='form-group'>
					<label for='is_suscribed'>Is Suscribed ?</label>
					<br>
					<input type="checkbox" name='is_suscribed' 
					data-on-text="Yes" data-off-text="No"
					data-on-color="success" data-off-color="danger"
					data-size="small">
				</div>
				<div class='form-group'>
					<label for='has_responded'>Has responded ?</label>
					<br>
					<input type="checkbox" name='has_responded'
					data-on-text="Yes" data-off-text="No"
					data-on-color="success" data-off-color="danger"
					data-size="small">
				</div>
				<hr>
				<button type='submit' class='btn btn-primary btn-lg'>Create Client</button>
			</form>
		</div>
	</div>
@stop