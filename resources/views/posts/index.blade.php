@extends('layouts.app')
@section('content')

<div class="container">

    @if(session('postadded') == true)
    <div class="alert alert-success" role="alert">
    {{ session('postadded') }}
    </div>
    @endif

    @if(session('postedit') == true)
    <div class="alert alert-success" role="alert">
    {{ session('postedit') }}
    </div>
    @endif

    @if(session('com') == true)
    <div class="alert alert-success" role="alert">
    {{ session('com') }}
    </div>
    @endif

      <div class="row">

        <div class="col-sm-8 blog-main">
        	<div class="blog-post">
              <a class="blog-post-title">{{ $post->title }}</a>

              <p class="blog-post-meta">{{ $post->updated_at->diffForHumans() }} <a href="#">{{ $post->user->name }}</a></p>
              <h4>{{ $post->text }}</h4>
            </div>

            @foreach($post->comment as $comment)

            <div class="blog-post">
            	<h6>{{ $comment->user->name }}</h6>
            	{{ $comment->updated_at->diffForHumans() }}<br>
              {{ $comment->text }}
            </div>

            @endforeach

            <form method="post" action="/comments/create/{{ $post->id }}">
	          	{{ csrf_field() }}

	          	<div class="form-group">
	          		<textarea type="text" name="text" class="form-control" placeholder="Comment"></textarea>
	          	</div>
	          	
	          	<div class="form-group">
	          		<input type="submit" class="btn-btn default" name="submit">		
	          	</div>

          	</form>

            <ul>
                    @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                    @endforeach     
            </ul>


          	@if($post->user_id == Auth::user()->id)
          		<a href="/posts/{{ $post->id }}/edit" style="color: green;">Edit your post</a><br>
          		<form method="get" action="/posts/{{ $post->id }}/destroy">
          		<a href="/posts/{{ $post->id }}/destroy" style="color: red;">Delete your post</a>
          		</form>
          	@else

          	@endif
        </div>

          

</div>




@endsection