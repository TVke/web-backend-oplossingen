<?php

namespace hackernews;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
	protected $fillable=['title','url'];
	public function author(){
		return $this->belongsTo(User::class,'user_id','id');
	}
	public function votes(){
		return $this->hasMany(Vote::class,'article_id','id');
	}
	public function comments(){
		return $this->hasMany(Comment::class,'article_id','id');
	}

}
