<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
   
   public function store($post_id){
   	
   	 $this->validate(request(), [
            'text' => 'required|max:255',
            ]);

   	$user = Auth::user()->id;

   	Comment::create([

   		'user_id' => $user,
   		'post_id' => $post_id,
   		'text' => request('text')
   	]);

   	return back()->with('com', 'Comment Added');



   }
}
	