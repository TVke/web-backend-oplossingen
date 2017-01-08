<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Styles -->
	<link href="/css/app.css" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ff8505">
	<meta name="msapplication-TileColor" content="#ff8505">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>
<body>
<header>
	<h1><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h1>
	<nav>
		@unless(Auth::guest())
			<ul>
				<li{{ Request::segment(1) === 'new'?' class=active':'' }}><a href="{{ url('/new') }}">add article</a></li>
			</ul>
		@endunless
		<ul id="login">
			@if (Auth::guest())
				<li{{ Request::segment(1) === 'login'?' class=active':'' }}><a href="{{ url('/login') }}">login</a></li>
				<li{{ Request::segment(1) === 'register'?' class=active':'' }}><a href="{{ url('/register') }}">register</a></li>
			@else
				<li id="user">{{ Auth::user()->name }}</li>
				<li>
					<form role="presentation" action="{{ url('/logout') }}" method="post">
						{{ csrf_field() }}
						<input role="link" type="submit" value="logout">
					</form>
				</li>
			@endif
		</ul>
	</nav>
</header>
<main>
	@yield('content')
</main>
<!-- Scripts -->
<script>
	window.Laravel = <?= json_encode([
		'csrfToken' => csrf_token(),
	]); ?>
</script>
</body>
</html>
