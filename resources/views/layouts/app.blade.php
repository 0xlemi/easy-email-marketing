<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Email Marketing</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/less.css') }}">
    <link rel="stylesheet" href="{{ elixir('css/main.css') }}">
</head>
<body id="app-layout">
    @include('layouts.nav')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.footer')
    
</body>
</html>