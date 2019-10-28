@extends('layouts.eballot')
@section('pageTitle', 'Edit User')
@section('content')
<div class="content ">
	<div class="container info_page">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="#">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							<a href="{{ route('users.index') }}">All users</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Edit user
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2 collapse d-md-flex bg-faded pt-2 h-100" id="sidebar">
				@include('layouts.sidebar')
			</div>
			<div class="col-sm-10">
				<h2>
					Edit user- <span class="text-info">{{ $user_edit->fname }}</span>
					<hr>
				</h2>
				<form method="POST" action="{{ route('users.update', [$user_edit->id]) }}">
					{{ csrf_field() }}

					<input type="hidden" name="_method" value="put">

					<div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} row">
						<label for="inputFName" class="col-sm-2">First Name</label>
						<div class="col-sm-10">
							<input id="inputFName" class="form-control" placeholder="First Name" required autofocus type="text" name="fname" value="{{ $user_edit->fname }}">
							@if ($errors->has('fname'))
							<span class="help-block">
								<strong>{{ $errors->first('fname') }}</strong>
							</span>
							@endif
						</div>
						
					</div>

					<div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }} row">
						<label for="inputLName" class="col-sm-2">Last Name</label>
						<div class="col-sm-10">
							<input id="inputLName" class="form-control" placeholder="Last Name" required type="text" name="lname" value="{{ $user_edit->lname }}">
							@if ($errors->has('lname'))
							<span class="help-block">
								<strong>{{ $errors->first('lname') }}</strong>
							</span>
							@endif
						</div>
						
					</div>

					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
						<label for="email" class="col-sm-2">Email</label>
						<div class="col-sm-10">
							<input id="email" class="form-control" placeholder="Email" required type="email" name="email" value="{{ $user_edit->email }}">
							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
						
					</div>

					<div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }} row">
						<label for="role_id" class="col-sm-2">Role</label>
						<div class="col-sm-10">
							<select class="form-control" name="role_id" required>
								@foreach($roles as $role)
								<option value="{{ $role->id }}"
									<?php
									if($role->id == $user_edit->role_id){
										echo "selected";
									}
									?>
									>
									{{ $role->name }}
								</option>
								@endforeach

								@if ($errors->has('role_id'))
								<span class="help-block">
									<strong>{{ $errors->first('role_id') }}</strong>
								</span>
								@endif
							</select>
						</div>
						
					</div>


					<button class="btn btn-primary " type="submit">Update</button>
					
				</form>
			</div>
		</div>

	</div>
</div>
@endsection
