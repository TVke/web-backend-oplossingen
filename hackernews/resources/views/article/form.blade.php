@extends('layouts.app')

@section('content')
	<a class="back" href="{{ route('article_overview') }}">back</a>
	<section>
		<h2>{{ Request::segment(1) ==='new'?'new':'edit'}} article</h2>
		@unless(Request::segment(1) === 'new')
			<a class="button" href="{{ route('article_confirm',['article'=>$article->id]) }}">delete article</a>
		@endunless
		@if(Request::segment(1)==='new')
			@include('layouts.notifications')
			<form action="{{ route('article_add') }}" method="post">
			{{ method_field("put") }}
		@else
			@include('layouts.notifications',['delete'=>route('article_delete',['article'=>$article->id]),'cancel'=>route('article_edit_form',['article'=>$article->id])])
			<form action="{{ route('article_edit',['article'=>$article->id]) }}" method="post">
			{{ method_field("patch") }}
		@endif
			{{ csrf_field() }}
			<label for="articleTitle"{{ $errors->has('title') ? 'class=has-error ' : '' }}>title (max. 255 characters)</label>
			<input type="text" id="articleTitle" {{ $errors->has('title') ? 'class=has-error ' : '' }}name="title" value="{{ $article->title or old('title') }}" required>
			<label for="link"{{ $errors->has('url') ? 'class=has-error ' : '' }}>URL</label>
			<input type="url" {{ $errors->has('url') ? 'class=has-error ' : '' }}name="url" id="link" value="{{ $article->url or old('url') }}" required>
			<input type="submit" value="{{ Request::segment(1) === 'new'?'add':'edit'}} article">
		</form>
	</section>
@endsection