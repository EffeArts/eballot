@extends('layouts.eballot')
@section('pageTitle', 'Edit Registered Voter')
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
							<a href="{{ route('registered_voters.index') }}">Registered voters</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Edit registered voter
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
					Edit registered voter - <span class="text-info">{{ $voter->fname }}</span>
					<hr>
				</h2>
				@include('layouts.messages_section')
				<form method="POST" action="{{ route('registered_voters.update', [$voter->id]) }}">
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

					<div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} row">
						<label for="gender" class="col-sm-2">Gender</label>
						<div class="col-sm-10">
							<select class="form-control" name="gender" required>
								
								<!-- The if conditions in gender options are there to check the gender of the user so that it comes pre selected -->

								<option value="Male" <?php if($voter->gender === "Male"){ echo "selected"; } ;?>>
									Male
								</option>
								<option value="Female" <?php if($voter->gender === "Female"){ echo "selected"; } ;?>>
									Female
								</option>
								@if ($errors->has('gender'))
								<span class="help-block">
									<strong>{{ $errors->first('gender') }}</strong>
								</span>
								@endif
							</select>
						</div>

					</div>

					<div class="form-group{{ $errors->has('class') ? ' has-error' : '' }} row">
						<label for="class" class="col-sm-2">Class</label>
						<div class="col-sm-10">
							<select class="form-control" name="class" required>
								
								<!-- The if conditions in gender options are there to check the gender of the user so that it comes pre selected -->

								<option value="1" <?php if($voter->class == 1){ echo "selected"; } ;?>>
									1
								</option>
								<option value="2" <?php if($voter->class == 2){ echo "selected"; } ;?>>
									2
								</option>
								<option value="3" <?php if($voter->class == 3){ echo "selected"; } ;?>>
									3
								</option>
								<option value="4" <?php if($voter->class == 4){ echo "selected"; } ;?>>
									4
								</option>
								@if ($errors->has('class'))
								<span class="help-block">
									<strong>{{ $errors->first('class') }}</strong>
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
