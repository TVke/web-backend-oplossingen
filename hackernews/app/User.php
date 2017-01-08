<?php

namespace hackernews;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles(){
    	return $this->hasMany(Articles::class);
    }

    public function votes(){
    	return $this->hasMany(Vote::class);
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

}
