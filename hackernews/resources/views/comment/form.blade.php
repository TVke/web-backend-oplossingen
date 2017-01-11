@extends('layouts.app')

@section('content')
	<section class="back">
		<a href="{{ route('article_overview') }}">back</a>
	</section>
	<section>
		<h2>articles</h2>
		@if(isset($toDelete))
			@include('layouts.notifications',['delete'=>route('comment_delete',['comment'=>$toDelete]),'cancel'=>route('comment_overview',['article'=>$article->id])])
		@else
			@include('layouts.notifications')
		@endif
		@include('layouts.article',['links'=>''])
		<ul class="comments">
			@foreach( $comments as $comment)
				<li>
					<h4>{!! nl2br($comment->comment) !!}</h4>
					<hr>
					<sup>posted by {{ $comment->user->name }} {{ $comment->created_at->diffForHumans() }}
						@if(Auth::id()===$comment->user->id)
							<a href="{{ route('comment_edit_form',['comment'=>$comment->id]) }}" class="button">edit</a>
							<a href="{{ route('comment_confirm',['article'=>$article->id,'comment'=>$comment->id]) }}" class="button delete">delete</a>
						@endif
					</sup>
				</li>
			@endforeach
		</ul>
@if(Auth::guest())
	<p>You need to be <a href="{{ route('login') }}">logged in</a> to comment</p>
	@else
		<form action="{{ route('comment_add',['article'=>$article->id]) }}" method="post">
			{{ csrf_field() }}
			{{ method_field("put") }}
			<label for="commentContent"{{ $errors->has('comment') ? 'class=has-error ' : '' }}>comment</label>
			<textarea name="comment" {{ $errors->has('comment') ? 'class=has-error ' : '' }}id="commentContent" maxlength="255" required>{{ old('comment') }}</textarea>
			<input type="submit" value="add comment">
		</form>
	@endif
	</section>
@endsection