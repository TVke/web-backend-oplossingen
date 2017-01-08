@extends('layouts.app')

@section('content')
	<section>
		<h2>login</h2>
		@include('layouts.notifications')
		<form method="POST" action="{{ url('/login') }}">
			{{ csrf_field() }}
			<label for="email">e-mail address</label>
			<input id="email" type="email" {{ $errors->has('email') ? 'class=has-error ' : '' }}name="email" value="{{ old('email') }}" required autofocus>
			<label for="password">password</label>
			<input id="password" type="password" {{ $errors->has('password') ? 'class=has-error ' : '' }}name="password" required>
			<label class="login"><input type="checkbox" name="remember">remember me</label>
			<a class="login" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
			<input type="submit" value="login">
		</form>
	</section>
@endsection
