@extends('layout.app')

@section('content')
    <div class="jumbotron">
        <h1>Email Marketing</h1>
        <p>Make list of senders, create your own html email for marketing.</p>
        <a class="btn btn-primary" href="{{ url('/clients/create') }}">Add a new posible Client</a>
    </div>
@stop