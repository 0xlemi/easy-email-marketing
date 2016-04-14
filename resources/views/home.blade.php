@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="jumbotron">
        <h1>Simple marketing!</h1>
        <br>
        <p>Create groups, create clients, add your own html emails and send them in bulk or individualy.</p>
        <br>
        <a href="{{ url('groups/create') }}" class="btn btn-success">Create a new group</a><br><br>
        <a href="{{ url('clients/create') }}" class="btn btn-primary">Create new client</a><br><br>
        <a href="{{ url('emails/create') }}" class="btn btn-warning">Create new email</a><br><br>
      </div>
    </div>
@endsection
