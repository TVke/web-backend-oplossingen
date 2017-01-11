<?php

namespace hackernews\Http\Controllers;

use hackernews\Articles;
use hackernews\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',['except'=>['commentForm']]);
	}

	public function commentForm(Articles $article)
	{
		$article = Articles::with('author','comments','votes')->where('id',$article->id)->first();
		$comments = Comment::with('user')->where('article_id',$article->id)->latest()->get();
		return view('comment.form',compact('article','comments'));
	}

	public function add(Request $request, Articles $article)
	{
		$this->validate($request,[
			'comment'=> ['required','string','max:400']
		]);
		$comment = new Comment($request->all());
		$comment->article()->associate($article);
		Auth::user()->comments()->save($comment);
		session()->flash('success', trans('hackernews.comment.add'));
		return redirect()->route('comment_overview',['article'=>$article->id]);
	}

	public function editForm(Comment $comment)
	{
		if($comment->user_id===Auth::id()){
			$comment->with('article','user')->where('id',$comment->id)->first();
			return view('comment.edit',compact('comment'));
		}else{
			session()->flash('error', trans('hackernews.comment.error.edit'));
			return redirect()->route('comment_overview',['article'=>$comment->article_id]);
		}
	}

	public function update(Request $request, Comment $comment)
	{
		if($comment->user_id===Auth::id()){
			$this->validate($request,[
				'comment'=> ['required','string','max:400']
			]);
			$comment->update($request->all());
			session()->flash('success', trans('hackernews.comment.edit'));
			return redirect()->route('comment_edit_form',['comment'=>$comment->id]);
		}else{
			session()->flash('error', trans('hackernews.comment.error.edit'));
			return redirect()->route('comment_overview',['article'=>$comment->article_id]);
		}
	}

	public function editConfirm(Comment $comment)
	{
		if($comment->user_id===Auth::id()){
			session()->flash('confirm', trans('hackernews.comment.confirm'));
			return view('comment.edit',compact('comment'));
		}else{
			session()->flash('error', trans('hackernews.comment.error.delete'));
			return redirect()->route('comment_overview',['article'=>$comment->article_id]);
		}
	}

	public function confirm(Articles $article,Comment $comment)
	{
		if($comment->user_id===Auth::id()){
			$comments = $comment->with('user')->where('article_id',$article->id)->latest()->get();
			$toDelete = $comment;
			session()->flash('confirm', trans('hackernews.comment.confirm'));
			return view('comment.form',compact('article','comments','toDelete'));
		}else{
			session()->flash('error', trans('hackernews.comment.error.delete'));
			return redirect()->route('comment_overview',['article'=>$comment->article_id]);
		}
	}

	public function delete(Comment $comment)
	{
		if($comment->user_id===Auth::id()){
			$commentFromArticle = $comment->with('article')->where('id',$comment->id)->first();
			$comment->delete();
			session()->flash('success', trans('hackernews.comment.delete'));
			return redirect()->route('comment_overview',['article'=>$commentFromArticle->article->id]);
		}else{
			session()->flash('error', trans('hackernews.comment.error.delete'));
			return redirect()->route('comment_overview',['article'=>$comment->article_id]);
		}
	}
}