<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Email Marketing</title>
  <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>

@include('layout.nav')

<div class="container">
  @yield('content')
</div>

<script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>