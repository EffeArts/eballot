@extends('layouts.eballot')
@section('pageTitle', 'Profile')
@section('content')
<div class="content ">
	<div class="container info_page">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Candidate's Information</h2>
				<h5 class="text-center"> Please fill as much information as you can.</h5>
				<hr>
				@include('layouts.messages_section')
			</div>
			
		</div>
		<form method="POST" action="{{ route('candidate_profile.update', $candidate->id) }}">
			{{ csrf_field() }}
			<div class="row">


				<input name="_method" type="hidden" value="PUT">

				<div class="col-md-12">


					<div class="form-group row">
						<label for="fname" class="col-sm-3">
							<h5 class="float-right">First name:</h5>
						</label>
						<div class="col-sm-9">
							<input id="fname" class="form-control" placeholder="First Name" required type="text" name="fname" value="{{ $candidate->user->fname }}" disabled>
							<br>
						</div>
						
					</div>

					<div class="form-group row">
						<label for="lname" class="col-sm-3">
							<h5 class="float-right">Last name:</h5>
						</label>
						<div class="col-sm-9">
							<input id="lname" class="form-control" placeholder="Last Name" required type="text" name="lname" value="{{ $candidate->user->lname }}" disabled>
							<br>
						</div>
						
					</div>
					<div class="form-group row">
						<label for="position" class="col-sm-3">
							<h5 class="float-right">Position:</h5>
						</label>
						<div class="col-sm-9">
							<input id="position" class="form-control" required type="text" name="position" value="{{ $candidate->position->name }}" disabled>
							<br>
						</div>
						
					</div>
					<div class="form-group row">
						<label for="manifesto" class="col-sm-3">
							<h5 class="float-right">Manifesto:</h5>
						</label>
						<div class="col-sm-9">
							<textarea id="manifesto" class="form-control" required name="manifesto" rows="5">{{ $candidate->manifesto }}</textarea> 
							<br>
						</div>
						
					</div>
					<div class="float-right">
						<?php
							if($candidate->manifesto == 'NULL'){
								echo '<button class="btn btn-success float-right" type="submit">Register</button>';
							} 

							else{
								echo '<button class="btn btn-success float-right" type="submit">Update</button>';
							}
						?>
						
					</div>


					<!-- <button class="btn btn-primary " type="submit">Register</button> -->
					

				</div>

			</div>
		</form>
	</div>
</div>
@endsection
