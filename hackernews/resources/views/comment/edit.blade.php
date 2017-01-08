@extends('layouts.app')

@section('content')
	<a class="back" href="{{ route('comment_overview',['article'=>$comment->article->id]) }}">back</a>
	<section>
		<h2>edit comment</h2>
		<a class="button" href="{{ route('comment_edit_confirm',['comment'=>$comment->id]) }}">delete comment</a>
		@include('layouts.notifications',['delete'=>route('comment_delete',['comment'=>$comment->id]),'cancel'=>route('comment_edit_form',['comment'=>$comment->id])])
		<form action="{{ route('comment_edit',['comment'=>$comment->id]) }}" method="post">
			{{ csrf_field() }}
			{{ method_field("patch") }}
			<label for="commentContent"{{ $errors->has('comment') ? 'class=has-error ' : '' }}>comment</label>
			<textarea {{ $errors->has('comment') ? 'class=has-error ' : '' }}id="commentContent" name="comment" required>{{ $comment->comment or old('comment') }}</textarea>
			<input type="submit" value="edit comment">
		</form>
	</section>
@endsection