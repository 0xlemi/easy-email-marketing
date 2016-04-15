@extends('layouts.app')

@section('content')
<h1>Edit Client:</h1>
<hr>
<div class="row">
	<div class="col-md-offset-3 col-md-6">
		<form action="{{ url('/clients/'.$client->id) }}" method="POST">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<div class='form-group'>
				<label for='name'>Name:</label>
				<input type='text' class='form-control' name='name' value="{{ $client->name }}">
			</div>
			<div class='form-group'>
				<label for='last_name'>Lastname:</label>
				<input type='text' class='form-control' name='last_name' value="{{ $client->last_name }}">
			</div>
			<div class='form-group'>
				<label for='email'>Email:</label>
				<input type='email' class='form-control' name='email' required value="{{ $client->email }}">
			</div>
			<div class='form-group'>
				<label for='company'>Company name:</label>
				<input type='text' class='form-control' name='company' required value="{{ $client->company }}">
			</div>
			<div class='form-group'>
				<label for='group'>Group:</label><br>
				<select class="selectpicker" name="group" data-live-search="true">
					@foreach($groups as $group)
						<option value="{{ $group->id }}"
									data-tokens="{{ $group->name }}" 
									{{ ($client->group->id == $group->id) ? 'selected':''}}>{{ $group->name }}
						</option>
					@endforeach
				</select>
			</div>
			<div class='form-group'>
				<label for='has_responded'>Has responded ?</label>
				<br>
				<input type="checkbox" name='has_responded'
				data-on-text="Yes" data-off-text="No"
				data-on-color="success" data-off-color="danger"
				data-size="small" {{ ($client->has_responded) ? 'checked':'' }}>
			</div>
			<div class='form-group'>
				<label for='is_suscribed'>Is Suscribed ?</label>
				<br>
				<input type="checkbox" name='is_suscribed' 
				data-on-text="Yes" data-off-text="No"
				data-on-color="success" data-off-color="danger"
				data-size="small" {{ ($client->is_suscribed) ? 'checked':'' }}>
			</div>
			<hr>
			<button type='submit' class='btn btn-primary btn-lg'>Update Client</button>
		</form>
		<a class="pull-right" href="{{ url('/clients/'.$client->id) }}">View Client</a>
	</div>
</div>
@stop