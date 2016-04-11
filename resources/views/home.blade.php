@extends('layout.app')

@section('content')
    <div class="jumbotron">
        <h1>Email Marketing</h1>
        <p>Make list of posible clients.<br>Create your own html email.<br>Send email marketing easily.</p>
        <a class="btn btn-primary" href="{{ url('/clients/create') }}">Add a new posible client</a>

        <a class="btn btn-warning" href="{{ url('/emails/create') }}">Add a new email</a>
    </div>
@stop