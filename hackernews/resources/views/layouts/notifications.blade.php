{{--errors--}}
@if(count($errors))
	<div class="error">
		@if(count($errors)>1)
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@else
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		@endif
	</div>
@endif

{{--confirms--}}
@if (session()->has('confirm'))
	<div class="confirm">
		<p>{{ session('confirm') }}</p>
		<form action="{{ $delete }}" method="post">
			{{ csrf_field() }}
			{{ method_field('delete') }}
			@if(isset($comment))
				<input type="submit" value="delete comment">
			@else
				<input type="submit" value="delete article">
			@endif
		</form>
		<a href="{{ $cancel }}">cancel</a>
	</div>
	@php
		session()->forget('confirm');
	@endphp
@endif

{{--own errors--}}
@if (session('error'))
	<div class="error"><p>{{ session('error') }}</p></div>
@endif

{{--success--}}
@if (session()->has('success'))
	<div class="success"><p>{{ session('success') }}</p></div>
@endif

{{--laravel success--}}
@if (session('status'))
	<div class="success">{{ session('status') }}</div>
@endif