@extends('layouts.app')

@section('content')

	<div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">
        	

            <form method="post" action="/posts/{{ $edit->id }}/patch">
	          	{{ csrf_field() }}

	          	<div class="form-group">
	          		<input type="text" name="title" class="form-control" value="{{ $edit->title }}" >
	          	</div>

	          	

	          	<div class="form-group">
	          		<textarea type="text" name="text" class="form-control">{{ $edit->text }}</textarea>
	          	</div>
	          	
	          	<div class="form-group">
	          		<input type="submit" class="btn-btn default" name="submit" value="Edit">		
	          	</div>   
          	</form>

          		<ul>
                    @foreach($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                    @endforeach     
               </ul>

        </div>



          

</div>

@endsection