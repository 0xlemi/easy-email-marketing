@extends('layouts.app')

@section('content')
	<!-- <div id="rootwizard">
		<ul>
		  	<li><a href="#tab1" data-toggle="tab">First</a></li>
			<li><a href="#tab2" data-toggle="tab">Second</a></li>
			<li><a href="#tab3" data-toggle="tab">Third</a></li>
			<li><a href="#tab4" data-toggle="tab">Forth</a></li>
			<li><a href="#tab5" data-toggle="tab">Fifth</a></li>
			<li><a href="#tab6" data-toggle="tab">Sixth</a></li>
			<li><a href="#tab7" data-toggle="tab">Seventh</a></li>
		</ul>
		<div class="tab-content">
		    <div class="tab-pane" id="tab1">
		      	<h3>Select Client</h3>
                <hr>
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
				<input type="hidden" name="client" id="form_client_id" required>
		    </div>
		    <div class="tab-pane" id="tab2">
		    	<h3>Select Email</h3>
                <hr>
                <div id="grid">
					<div class="grid-sizer"></div>
					@foreach($emails as $email)
					 	<a class="grid-item" href="{{ url('emails/'.$email->id)}}">
					  		<img src="{{ url($email->path_thumbnail) }}">
					 	</a>
					@endforeach
				</div>
		    </div>
			<div class="tab-pane" id="tab3">
				3
		    </div>
			<ul class="pager wizard">
				<li class="previous first" style="display:none;"><a href="#">First</a></li>
				<li class="previous"><a href="#">Previous</a></li>
				<li class="next last" style="display:none;"><a href="#">Last</a></li>
			  	<li class="next"><a href="#">Next</a></li>
			</ul>
		</div>	
	</div> -->
@stop