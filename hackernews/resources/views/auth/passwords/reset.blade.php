@extends('layouts.app')

@section('content')
	<section>
		<h2>reset password</h2>
		@include('layouts.notifications')
		<form method="POST" action="{{ url('/password/reset') }}">
			{{ csrf_field() }}
			<input type="hidden" name="token" value="{{ $token }}">
			<label for="email">E-Mail Address</label>
			<input id="email" type="email" {{ $errors->has('email') ? 'class=has-error ' : '' }}name="email" value="{{ $email or old('email') }}" required autofocus>
			<label for="password">Password</label>
			<input id="password" type="password" {{ $errors->has('password') ? 'class=has-error ' : '' }}name="password" required>
			<label for="password-confirm">Confirm Password</label>
			<input id="password-confirm" type="password" {{ $errors->has('password_confirmation') ? 'class=has-error ' : '' }}name="password_confirmation" required>
			<input type="submit" value="reset password">
		</form>
	</section>
@endsection
