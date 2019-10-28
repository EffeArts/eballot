@extends('layouts.eballot')
@section('pageTitle', 'Login')
@section('content')
<div class="content text-center">
	<form class="form-signin" method="POST" action="{{ route('login') }}">
		{{ csrf_field() }}

		<h1 class="h3 mb-3 font-weight-normal">Sign in</h1>

		<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="email" class="sr-only">Email</label>
			<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

			@if ($errors->has('email'))
			<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
			</span>
			@endif
		</div>
		
		<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<label for="password" class="sr-only">Password</label>
			<input placeholder="Password" id="password" type="password" class="form-control" name="password" required>
			@if ($errors->has('password'))
			<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
			</span>
			@endif
		</div>
		
		<div class="checkbox mb-3">
			<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="rememberme" class="filled-in chk-col-pink">
			<label for="rememberme">Remember Me</label>
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