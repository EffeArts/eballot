@extends('layouts.eballot')
@section('pageTitle', 'Register')
@section('content')
<div class="content text-center">
	<form class="form-signin"  method="POST" action="{{ route('register') }}">
		{{ csrf_field() }}
		<h1 class="h3 mb-3 font-weight-normal">Sign up</h1>

		<div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
			<label for="inputFName" class="sr-only">First Name</label>
			<input id="inputFName" class="form-control" placeholder="First Name" required autofocus type="text" name="fname" value="{{ old('fname') }}">
			@if ($errors->has('fname'))
			<span class="help-block">
				<strong>{{ $errors->first('fname') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
			<label for="inputLName" class="sr-only">Last Name</label>
			<input id="inputLName" class="form-control" placeholder="Last Name" required type="text" name="lname" value="{{ old('lname') }}">
			@if ($errors->has('lname'))
			<span class="help-block">
				<strong>{{ $errors->first('lname') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="inputEmail" class="sr-only">Email address</label>
			<input id="inputEmail" class="form-control" placeholder="Email address" required="" type="email" name="email" value="{{ old('email') }}">
			@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label for="inputPassword" class="sr-only">Password</label>
			<input id="inputPassword" class="form-control" placeholder="Password" type="password" name="password" required>
			@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group">
			<label for="password-confirm" class="sr-only">Confirm Password</label>
			<input id="password-confirm" class="form-control" placeholder="Confirm Password" name="password_confirmation" required type="password">
		</div>


		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<p class="mt-5 mb-3 text-muted">
			<div class="col-12 col-md">
				<img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
				<small class="d-block mb-3 text-muted">
					<img class="bottom-logo" src="images/Logo.png"> 
					<br>effe Arts, Copyright 2018
				</small>
			</div>
		</p>
	</form>
</div>
@endsection