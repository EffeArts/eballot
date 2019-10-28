@extends('layouts.eballot')
@section('pageTitle', 'Guest')
@section('content')
<div class="content ">
	<div class="container info_page">
		<div class="row">
			<div class="col-sm-4">
				<img class="profile-pic" src="/uploads/avatars/{{ Auth::user()->avatar }}">
				<br>
				<br>
				<a href="#" id="avatar_selector">Change profile picture.</a>
				<br>
				<input type="file" name="avatar" id="avatar" class="avatar" style="display: none;">

				<br>

				<div class="personal_info">
					<ul class="list-unstyled">
						<li>
							<span class="intro">Names:</span> {{ Auth::user()->lname }}, {{ Auth::user()->fname }}
						</li>
						<li>
							<span class="intro">Email:</span> {{ Auth::user()->email }}
						</li>
					</ul>


				</div>
			</div>
			<div class="col-sm-8">
				<h4>
					It seems like you have not yet registered for the elections
				</h4>
				<hr>
				<h3>Election Form</h3>
				<p>Fill the form to register for voting eligibility, the failure to fill and submit the election form on time, will lead to your inability to cast a vote.</p>

				<!-- Voter registration form -->
				<form id="voter_registration" method="POST" action="{{url('voter_registration')}}" >
					{{ csrf_field() }}

					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
					@if(Session::has($msg))

					<div class="alert alert-{{ $msg }}  alert-dismissible fade show" role="alert">
						{{ Session::get($msg) }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif
					@endforeach

					<input type="hidden" name="id" class="form-control" id="id" value="{{ Auth::user()->id }}">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="firstName">First Name</label>
							<input type="text" name="fname" class="form-control" id="firstName" value="{{ Auth::user()->fname }}">
						</div>
						<div class="form-group col-md-6">
							<label for="lastName">Last Name</label>
							<input type="text" name="lname" class="form-control" id="lastName" value="{{ Auth::user()->lname }}">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="registrationNo">Registration Number</label>
							<input type="text" name="regno" class="form-control" id="registrationNo" required>
						</div>
						<div class="form-group col-md-3">
							<label for="gender">Gender</label>
							<select id="gender" name="gender" class="form-control" required>
								<option selected disabled>Choose...</option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="class">Class</label>
							<select id="class" name="class" class="form-control" required>
								<option selected disabled>Choose...</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck" required>
							<label class="form-check-label" for="gridCheck">
								I Agree <a href="">the terms and Conditions.</a>
							</label>
						</div>
					</div>
					<button type="submit" class="btn btn-warning">Register</button>
				</form>

			</div>
		</div>

	</div>
</div>
@include('layouts.croppie-modal')

</div>
@endsection
@section('js')
@include('layouts.avatar-uploaderJS')

@endsection