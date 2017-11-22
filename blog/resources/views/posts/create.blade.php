@extends('layouts.master')

@section('pagename')
	Publish a post
@endsection

@section('content')
<div class="col-xs-8">
	<form method="POST" action="/posts">
		<!-- include for all forms; echos out a hidden token; laravel compares this token to the token the website has to see if they match -->
		{{ csrf_field() }}
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Body</label>
			<textarea id="body" name="body" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-info">Publish</button>
		</div>

		@include ('layouts.errors')
	</form>
</div>
@endsection