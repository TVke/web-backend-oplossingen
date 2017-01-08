@extends('layouts.app')

@section('content')
	<section>
		<h2>register</h2>
		@include('layouts.notifications')
		<form method="POST" action="{{ url('/register') }}">
			{{ csrf_field() }}
			<label for="name">name</label>
			<input id="name" type="text" {{ $errors->has('name') ? 'class=has-error ' : '' }}name="name" value="{{ old('name') }}" required autofocus>
			<label for="email">e-mail address</label>
			<input id="email" type="email" {{ $errors->has('email') ? 'class=has-error ' : '' }}name="email" value="{{ old('email') }}" required>
			<label for="password">password</label>
			<input id="password" type="password" {{ $errors->has('password') ? 'class=has-error ' : '' }}name="password" required>
			<label for="password-confirm">confirm password</label>
			<input id="password-confirm" type="password" name="password_confirmation" required>
			<input type="submit" value="register">
		</form>
	</section>
@endsection
