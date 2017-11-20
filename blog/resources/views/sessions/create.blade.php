@extends('layouts.master')

@section('pagename')
Login
@endsection

@section('content')
	<div class="col-md-8">
		<form method="POST" action="/login">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="email">Email Address:</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>

			<div class="form-group">
				<button type="submit" class="btn-primary">Sign In</button>
			</div>

			@include ('layouts.errors')
		</form>
		<br>
		<div class="h5 text-left"><a href="/register">Create</a> an account</div>
	</div>

@endsection