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
		$sortedByComments = Articles::with('author','comments','votes')->where('deleted',0)->latest()->get()->sortByDesc(function($articles){
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
		$request->title = trim($request->title);
		$this->validate($request,[
			'title'=> ['required','max:255','string'],
			'url'=>['required','url','active_url']
		]);

		$article = new Articles($request->all());
		try{
			if(Auth::user()->articles()->save($article)){
				session()->flash('success', trans('hackernews.article.add',['title'=>$request->title]));
				return redirect()->route('article_overview');
			}else{
				throw new \PDOException();
			}
		}catch(\PDOException $e){
			session()->flash('error', trans('hackernews.article.error.emoticons'));
			return redirect()->route('article_add_form');
		}
	}

	public function editForm(Articles $article)
	{
		if($article->user_id===Auth::id() && $article->deleted===0){
			return view('article.form',compact('article'));
		}else{
			session()->flash('error', trans('hackernews.article.error.edit'));
			return redirect()->route('article_overview');
		}
	}

	public function edit(Request $request, Articles $article)
	{
		if($article->user_id===Auth::id() && $article->deleted===0){
			$request->title = trim($request->title);
			$this->validate($request,[
				'title' => ['required','max:255','string'],
				'url' => ['required','url','active_url']
			]);
			try{
				if($article->update($request->all())){
					session()->flash('success', trans('hackernews.article.edit',['title'=>$request->title]));
					return redirect()->route('article_edit_form',['article'=>$article->id]);
				}else{
					throw new \PDOException();
				}
			}catch(\PDOException $e){
				session()->flash('error', trans('hackernews.article.error.emoticons'));
				return redirect()->route('article_edit_form',['article'=>$article->id]);
			}
		}else{
			session()->flash('error', trans('hackernews.article.error.edit'));
			return redirect()->route('article_overview');
		}
	}

	public function confirm(Articles $article)
	{
		if($article->user_id===Auth::id() && $article->deleted===0){
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
		if($article->user_id===Auth::id() && $article->deleted===0){
			Articles::where('id',$article->id)->update(['deleted'=>1]);
			session()->flash('success', trans('hackernews.article.delete',['title'=>$article->title]));
			return redirect()->route('article_overview');
		}
		else{
			session()->flash('error', trans('hackernews.article.error.delete'));
			return redirect()->route('article_overview');
		}
	}
}