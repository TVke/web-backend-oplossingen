@extends('layouts.app')

@section('content')
	<section>
		<h2>reset password</h2>
		@include('layouts.notifications')
		<form method="POST" action="{{ url('/password/email') }}">
			{{ csrf_field() }}
			<label for="email">e-mail address</label>
			<input id="email" type="email" {{ $errors->has('email') ? 'class=has-error ' : '' }}name="email" value="{{ old('email') }}" required>
			<input type="submit" value="send password reset link">
		</form>
	</section>
@endsection
