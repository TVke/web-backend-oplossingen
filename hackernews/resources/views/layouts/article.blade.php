<article>
	<div class="voting">
		@unless(Auth::guest()||Auth::id()===$article->user_id) {{-- own articles --}}
			@if($article->load('votes')->votes->where('user_id',Auth::id())->count()===0) {{-- no vote by current user --}}
			@php
				$up_dis = 'disable';
				$down_dis = 'disable';
			@endphp
			@else
				@if($article->load('votes')->votes->where('up',0)->count()===0)
					@php
						$down_dis = 'disable';
					@endphp
				@else
					@php
						$up_dis = 'disable';
					@endphp
				@endif
			@endif
		@endunless
		@if(isset($up_dis))
			<form action="{{ route('vote_up',['article'=>$article->id]) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('patch') }}
				<input type="image" src="/img/up.svg" aria-label="up arrow">
			</form>

		@elseif(Auth::guest()||Auth::id()===$article->user_id)
			<img src="/img/up-dis.svg" alt="up arrow" title="{{ trans('hackernews.vote.error.access') }}">
		@else
			<img src="/img/up-dis.svg" alt="up arrow" title="{{ trans('hackernews.vote.error.up') }}">
		@endif
		@if(isset($down_dis))
			<form action="{{ route('vote_down',['article'=>$article->id]) }}" method="post">
				{{ csrf_field() }}
				{{ method_field('patch') }}
				<input type="image" src="/img/down.svg" aria-label="down arrow">
			</form>
		@elseif(Auth::guest()||Auth::id()===$article->user_id)
			<img src="/img/down-dis.svg" alt="down arrow" title="{{ trans('hackernews.vote.error.access') }}">
		@else
			<img src="/img/down-dis.svg" alt="down arrow" title="{{ trans('hackernews.vote.error.down') }}">
		@endif
	</div>
	<div>
		<h3>
			<a href="{{ $article->url }}">{{ $article->title }}</a>

			@if(Auth::id()===$article->user_id && $links)
				<a href="{{ route('article_edit_form',['article'=>$article->id]) }}" class="button">edit</a>
			@endif
		</h3>
		@if($links)
			<sup>{{ $article->load('votes')->votes->where('up',1)->count()-$article->load('votes')->votes->where('up',0)->count() }} points | posted by <span>{{ $article->author->name }}</span> {{ $article->created_at->diffForHumans() }} | <a href="{{ route('comment_overview',['article'=>$article->id]) }}">{{ $article->comments->count() }} {{ trans_choice('hackernews.comment.amount', $article->comments->count()) }}</a></sup>
		@else
			<sup>{{ $article->load('votes')->votes->where('up',1)->count()-$article->load('votes')->votes->where('up',0)->count() }} points | posted by <span>{{ $article->author->name }}</span> {{ $article->created_at->diffForHumans() }} | {{ $article->comments->count() }} {{ trans_choice('hackernews.comment.amount', $article->comments->count()) }}</sup>
		@endif
	</div>
</article>