<?php

namespace hackernews\Http\Controllers;

use hackernews\Articles;
use hackernews\Comment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;

class CommentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',['except'=>['commentForm']]);
	}

	public function commentForm(Articles $article)
	{
		if($article->deleted===0){
			$article = Articles::with('author','comments','votes')->where([['id',$article->id],['deleted',0]])->first();
			$comments = Comment::with('user')->where([['article_id',$article->id],['deleted',0]])->latest()->get();
			return view('comment.form',compact('article','comments'));
		}else{
			session()->flash('error', trans('hackernews.article.error.edit'));
			return redirect()->route('article_overview');
		}
	}

	public function add(Request $request, Articles $article)
	{
		if($article->deleted===0){
			$request->comment = trim($request->comment); // remove whitespace
			$request->comment = str_replace('\r','<br>',trim($request->comment)); // add enters
			$this->validate($request,[
				'comment'=> ['required','string','max:400']
			]);
			$comment = new Comment($request->all());
			$comment->article()->associate($article);
			try{
				if(Auth::user()->comments()->save($comment)){
					session()->flash('success', trans('hackernews.comment.add'));
					return redirect()->route('comment_overview',['article'=>$article->id]);
				}else{
					throw new \PDOException();
				}
			}catch(\PDOException $e){
				session()->flash('error', trans('hackernews.comment.error.emoticons'));
				return redirect()->route('comment_overview',['article'=>$article->id]);
			}
		}else{
			session()->flash('error', trans('hackernews.article.error.edit'));
			return view('article_overview');
		}
	}

	public function editForm(Comment $comment)
	{
		if($comment->user_id===Auth::id() && $comment->deleted===0){
			$comment->with('article','user')->where('id',$comment->id)->first();
			return view('comment.edit',compact('comment'));
		}else{
			session()->flash('error', trans('hackernews.comment.error.edit'));
			return redirect()->route('comment_overview',['article'=>$comment->article_id]);
		}
	}

	public function update(Request $request, Comment $comment)
	{
		if($comment->user_id===Auth::id() && $comment->deleted===0){
			$request->comment = trim($request->comment); // remove whitespace
			$request->comment = str_replace('\r','<br>',trim($request->comment)); // add enters
			$this->validate($request,[
				'comment'=> ['required','string','max:400']
			]);
			try{
				if($comment->update($request->all())){
					session()->flash('success', trans('hackernews.comment.edit'));
					return redirect()->route('comment_edit_form',['article'=>$comment->id]);
				}else{
					throw new \PDOException();
				}
			}catch(\PDOException $e){
				session()->flash('error', trans('hackernews.comment.error.emoticons'));
				return redirect()->route('comment_edit_form',['article'=>$comment->id]);
			}
		}else{
			session()->flash('error', trans('hackernews.comment.error.edit'));
			return redirect()->route('comment_overview',['article'=>$comment->article_id]);
		}
	}

	public function editConfirm(Comment $comment)
	{
		if($comment->user_id===Auth::id() && $comment->deleted===0){
			session()->flash('confirm', trans('hackernews.comment.confirm'));
			return view('comment.edit',compact('comment'));
		}else{
			session()->flash('error', trans('hackernews.comment.error.delete'));
			return redirect()->route('comment_overview',['article'=>$comment->article_id]);
		}
	}

	public function confirm(Articles $article,Comment $comment)
	{
		if($comment->user_id===Auth::id() && $comment->deleted===0){
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
		if($comment->user_id===Auth::id() && $comment->deleted===0){
			$commentFromArticle = $comment->with('article')->where('id',$comment->id)->first();
			Comment::where('id',$comment->id)->update(['deleted'=>1]);
			session()->flash('success', trans('hackernews.comment.delete'));
			return redirect()->route('comment_overview',['article'=>$commentFromArticle->article->id]);
		}else{
			session()->flash('error', trans('hackernews.comment.error.delete'));
			return redirect()->route('comment_overview',['article'=>$comment->article_id]);
		}
	}
}