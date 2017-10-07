@extends('layouts.app')

@section('content')
	<div class="container">
     <div class="row">
     <div class="col-sm-8 blog-main">
          <div class="blog-post">
            <h2 class="blog-post-title">Create A Post</h2>
          </div><!-- /.blog-post -->

          <form method="post" action="/posts/create">
          	{{ csrf_field() }}
          	<div class="form-group">   
          		<input type="text" name="title" class="form-control" placeholder="Post Title">
          	</div>
          	
          	<div class="form-group">  
          		<textarea name="text" class="form-control" placeholder="Your Post"></textarea>
          	</div>
          	
          	<div class="form-group">
          		<input type="submit" class="btn-btn default" name="submit">		
          	</div>
          	
               <ul>
                    @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                    @endforeach     
               </ul>

          </form>

    
@endsection