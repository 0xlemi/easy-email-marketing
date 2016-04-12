@extends('layout.app')

@section('content')
	<br>
	<div class="row">
		<div class="col-md-9 col-md-offset-3">
			<div class="col-md-7">
				<div class="panel panel-default">
		            <div class="panel-heading">
		              <h3 class="panel-title">Client info:</h3>
		            </div>
			        <div class="panel-body">
						<div class="col-md-6">
							<h4>Company:</h4>
							<h4>Full name:</h4>
							<h4>Email:</h4>
							<h4>Has responded?</h4>
							<h4>Is suscribed?</h4>
							<h4>Created at:</h4>
							<h4>Times sent:</h4>
						</div>
						<div class="col-md-6">
							<h4><small>{{ $client->company }}</small></h4>
							<h4><small>{{ $client->name.' '.$client->last_name }}</small></h4>
							<h4><small>{{ $client->email }}</small></h4>
							<h4>
								<small>
									<span class="label label-{{ ($client->has_responded) ? 'success' : 'danger' }}">
										{{ ($client->has_responded) ? 'Yes' : 'No' }}
									</span>
								</small>
							</h4>
							<h4>
								<small>
									<span class="label label-{{ ($client->is_suscribed) ? 'success' : 'danger' }}">
										{{ ($client->is_suscribed) ? 'Yes' : 'No' }}
									</span>
								</small>
							</h4>
							<h4><small>{{ $client->created_at }}</small></h4>
							<h4><small>{{ $client->times_sent }}</small></h4>
						</div>
					</div>
		        </div>
		        <a class="pull-right btn text-danger" 
		        	data-method="delete" data-token="{{ csrf_token() }}" 
		        	data-confirm="Are you sure?" href="{{ url('/clients/'.$client->id) }}">Delete Client</a>

		        <a class="pull-right btn btn-link" href="{{ url('/clients/'.$client->id.'/edit') }}">Edit Client</a>
	        </div>
		</div>
	</div>
	<div class="row">
		<h3>Client transactions:</h3>
		<hr>
		<div class="col-md-8 col-md-offset-2">
			<table id="client_transaction_table" class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Date</th>
						<th>Time</th>
						<th>Sent to</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($client->transactions as $transaction)
						<tr>
							<td>{{ $transaction->id }}</td>
							<td>{{ $transaction->created_at->toFormattedDateString() }}</td>
							<td>{{ $transaction->created_at->toTimeString() }}</td>
							<td>{{ $transaction->email_to }}</td>
							<td>{{ $transaction->email->id.' '.$transaction->email->name }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
@stop