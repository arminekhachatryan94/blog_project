@extends ('layouts.master')

@section('pagename')
Settings
@endsection

@section('content')
<div class="col-md-8">
	@include ('layouts.errors')

	<!-- {{ $user->password }} -->
	<!-- change name -->
	<div class="h3">Edit Name</div>
	<form method="POST" action="/settings/name">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" id="password" name="password" required>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save Name</button>
		</div>
	</form>

	<br><br>

	<!-- change email -->
	<div class="h3">Edit Email</div>
	<form method="POST" action="/settings/email">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" id="password" name="password" required>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save Email</button>
		</div>
	</form>

	<br><br>

	<!-- change password -->
	<div class="h3">Edit Password</div>
	<form method="POST" action="/settings/password">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="oldpassword">Old Password:</label>
			<input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
		</div>

		<div class="form-group">
			<label for="password">New Password:</label>
			<input type="password" class="form-control" id="password" name="password" required>
		</div>

		<div class="form-group">
			<label for="password_confirmation">Confirm New Password:</label>
			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save Password</button>
		</div>
	</form>

	<br><br>
</div>


@endsection