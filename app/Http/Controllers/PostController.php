<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

      	 return view('posts/create');
    }

    public function store(){

    	$user_id = Auth::user()->id;
       
        $this->validate(request(), [
            'title' => 'required',
            'text' => 'required|max:255',
            ]);


    	$post = Post::create([
    		'user_id' => $user_id,
    		'title' => request('title'),
    		'text' => request('text')
    	]);

        if($post == true){
            return redirect('/posts/'.$post->id)->with('postadded','Post Created');
        }

    	

    }

    public function index($id){

        $post = Post::where('id', $id)->first();
        return view('posts.index', compact(('post')));
    }

    public function edit($id){

        $edit = Post::where('id', $id)->first();

        return view('posts.edit', compact(('edit')));
    }

    

    public function patch($id){

        $this->validate(request(), [
            'title' => 'required',
            'text' => 'required|max:255',
            ]);

        $post = Post::where('id', $id)->first();

        $post->fill([
            'user_id' => Auth::user()->id,
            'title' => request('title'),
            'text' => request('text')

         ]);

        $post->save();

        return redirect('/posts/'.$post->id)->with('postedit', 'Post Edited');
    }

    public function destroy($id){

        $post = Post::find($id);
        $post->delete();

        return Redirect('/home')->with('deleted', 'Post Deleted');

    }
}
