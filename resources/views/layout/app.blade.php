<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Email Marketing</title>
  <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
  <link rel="stylesheet" href="{{ elixir('css/less.css') }}">
  <link rel="stylesheet" href="{{ elixir('css/main.css') }}">
</head>
<body>

@include('layout.nav')
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

<script src="{{ elixir('js/app.js') }}"></script>
@include('extras.flash')

</body>
</html>