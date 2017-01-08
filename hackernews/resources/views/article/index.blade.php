@extends('layouts.app')

@section('content')
	<section>
		<h2>articles</h2>
		@include('layouts.notifications')
		@foreach( $article_list as $article)
			@include('layouts.article',['links'=>'true'])
		@endforeach
	</section>
@endsection
