<?php

namespace hackernews;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment'];

	public function article(){
		return $this->belongsTo(Articles::class);
	}
    public function user(){
    	return $this->belongsTo(User::class);
    }

}
