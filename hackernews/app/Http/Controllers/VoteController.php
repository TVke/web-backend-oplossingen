<?php

namespace hackernews\Http\Controllers;

use hackernews\Articles;
use hackernews\Vote;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function up(Articles $article)
	{
		$userID = Auth::id();
		if($article->user_id!==$userID){
			if(Vote::where([['user_id',$userID],['article_id',$article->id]])->count()===0){ // new vote
				$vote = new Vote();
				$vote->up = 1;
				$vote->article()->associate($article);
				Auth::user()->votes()->save($vote);
			}
			else{ // update vote
				if(Vote::where([['user_id',$userID],['article_id',$article->id],['up',1]])->count()===0){
					Vote::where([['user_id',$userID],['article_id',$article->id]])->update(['up'=>1]);
				}else{
					session()->flash('error', trans('hackernews.vote.error.up'));
					return redirect()->route('article_overview');
				}
			}
			session()->flash('success', trans('hackernews.vote.up',['title'=>$article->title]));
			return redirect()->route('article_overview');
		}else{
			session()->flash('error', trans('hackernews.vote.error.access'));
			return redirect()->route('article_overview');
		}
	}

	public function down(Articles $article)
	{
		$userID = Auth::id();
		if($article->user_id!==$userID){
			if(Vote::where([['user_id',$userID],['article_id',$article->id]])->count()===0){ // new vote
				$vote = new Vote();
				$vote->up = 0;
				$vote->article()->associate($article);
				Auth::user()->votes()->save($vote);
			}
			else{ // update vote
				if(Vote::where([['user_id',$userID],['article_id',$article->id],['up',0]])->count()===0){
					Vote::where([['user_id',$userID],['article_id',$article->id]])->update(['up'=>0]);
				}else{
					session()->flash('error', trans('hackernews.vote.error.down'));
					return redirect()->route('article_overview');
				}
			}
			session()->flash('success', trans('hackernews.vote.down',['title'=>$article->title]));
			return redirect()->route('article_overview');
		}else{
			session()->flash('error', trans('hackernews.vote.error.access'));
			return redirect()->route('article_overview');
		}
	}
}
