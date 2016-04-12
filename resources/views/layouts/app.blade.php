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

    <br>
    <footer class="footer">
        <div class="container">
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2016 Email Marketing App by Luis Espinosa </p>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script src="{{ elixir('js/app.js') }}"></script>
    @include('extras.flash')
    
</body>
</html>