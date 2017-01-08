<?php

namespace hackernews\Http\Controllers;

use hackernews\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', ['except'=>['index']]);
	}

	public function index()
	{
		$sortedByComments = Articles::with('author','comments','votes')->latest()->get()->sortBy(function($articles){
			return $articles->comments->count();
		});
		$sortByVotes = $sortedByComments->sortByDesc(function($articles){
			return $articles->votes->where('up',1)->count() - $articles->votes->where('up',0)->count();
		});
		$article_list = $sortByVotes->values()->all();
		return view('article.index',compact('article_list'));
	}

	public function addForm()
	{
		return view('article.form');
	}

	public function add(Request $request)
	{
		$this->validate($request,[
			'title'=> ['required','max:255'],
			'url'=>['required','url','active_url']
		]);
		$article = new Articles($request->all());
		Auth::user()->articles()->save($article);
		session()->flash('success', trans('hackernews.article.add',['title'=>$request->title]));
		return redirect()->route('article_overview');
	}

	public function editForm(Articles $article)
	{
		if($article->user_id===Auth::id()){
			return view('article.form',compact('article'));
		}else{
			session()->flash('error', trans('hackernews.article.error.edit'));
			return redirect()->route('article_overview');
		}
	}

	public function edit(Request $request, Articles $article)
	{
		if($article->user_id===Auth::id()){
			$this->validate($request,[
				'title' => ['required','max:255'],
				'url' => ['required','url','active_url']
			]);
			$article->update($request->all());
			session()->flash('success', trans('hackernews.article.edit',['title'=>$request->title]));
			return redirect()->route('article_edit_form',['article'=>$article->id]);
		}else{
			session()->flash('error', trans('hackernews.article.error.edit'));
			return redirect()->route('article_overview');
		}
	}

	public function confirm(Articles $article)
	{
		if($article->user_id===Auth::id()){
			session()->flash('confirm', trans('hackernews.article.confirm'));
			return view('article.form',compact('article'));
		}
		else{
			session()->flash('error', trans('hackernews.article.error.edit'));
			return redirect()->route('article_overview');
		}
	}

	public function delete(Articles $article)
	{
		if($article->user_id===Auth::id()){
			$article->delete();
			session()->flash('success', trans('hackernews.article.delete',['title'=>$article->title]));
			return redirect()->route('article_overview');
		}
		else{
			session()->flash('error', trans('hackernews.article.error.delete'));
			return redirect()->route('article_overview');
		}
	}
}