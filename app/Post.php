<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
    	'user_id', 'title','text'
    ];

    public function user(){

    	return $this->belongsTo(User::class, 'user_id');
    }

    public function comment(){

    	return $this->hasMany(Comment::class, 'post_id');
    }
}
