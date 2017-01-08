<?php

namespace hackernews;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['up'];

    public function article()
    {
    	return $this->belongsTo(Articles::class);
    }
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
