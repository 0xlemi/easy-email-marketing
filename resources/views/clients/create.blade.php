@extends('layout.app')

@section('content')
	<h1>Add new client:</h1>
	<hr>
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<form>
				<div class='form-group'>
					<label for='name'>Name:</label>
					<input type='text' class='form-control' name='name'>
				</div>
				<div class='form-group'>
					<label for='last_name'>Lastname:</label>
					<input type='text' class='form-control' name='last_name'>
				</div>
				<div class='form-group'>
					<label for='email'>Email:</label>
					<input type='email' class='form-control' name='email'>
				</div>
				<button type='submit' class='btn btn-primary'>Create Client</button>
			</form>
		</div>
	</div>
@stop