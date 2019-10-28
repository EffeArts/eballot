@extends('layouts.eballot')
@section('pageTitle', 'Edit Voter')
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
							<a href="{{ route('allowed_voters.index') }}">Allowed voters</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Edit voter
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<h2>
					Edit voter - <span class="text-info">{{ $voter->fname }}</span>
					<hr>
				</h2>
				<form method="POST" action="{{ route('allowed_voters.update', [$voter->id]) }}">
					{{ csrf_field() }}

					<input type="hidden" name="_method" value="put">

					<div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} row">
						<label for="inputFName" class="col-sm-2">First Name</label>
						<div class="col-sm-10">
							<input id="inputFName" class="form-control" placeholder="First Name" required autofocus type="text" name="fname" value="{{ $voter->fname }}">
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
							<input id="inputLName" class="form-control" placeholder="Last Name" required type="text" name="lname" value="{{ $voter->lname }}">
							@if ($errors->has('lname'))
							<span class="help-block">
								<strong>{{ $errors->first('lname') }}</strong>
							</span>
							@endif
						</div>
						
					</div>

					<div class="form-group{{ $errors->has('regno') ? ' has-error' : '' }} row">
						<label for="inputRegno" class="col-sm-2">Registration No.</label>
						<div class="col-sm-10">
							<input id="inputRegno" class="form-control" placeholder="Registration No." required type="text" name="regno" value="{{ $voter->regno }}">
							@if ($errors->has('regno'))
							<span class="help-block">
								<strong>{{ $errors->first('regno') }}</strong>
							</span>
							@endif
						</div>
						
					</div>


					<button class="btn btn-primary " type="submit">Update</button>
					
				</form>
			</div>
		</div>

	</div>
</div>
@endsection


	<form method="POST" action="{{ route('candidate_profile.update', $candidate->id) }}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input name="_method" type="hidden" value="PUT">