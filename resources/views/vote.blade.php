@extends('layouts.eballot')
@section('pageTitle', 'Vote')
@section('content')

<div class="content ">
	<div class="container info_page">
		<div class="row">
			<div class="col-md-2" id="sidebar">
				@include('layouts.elections_sidebar')
				
				<?php
				date_default_timezone_set('Africa/Kigali');
				$Draw_time_open = "23/10/2019 10:30:00";
				$Draw_time_close = "23/10/2019 10:45:00";
				$open_date = DateTime::createFromFormat("d/m/Y H:i:s",$Draw_time_open);
				$close_date = DateTime::createFromFormat("d/m/Y H:i:s",$Draw_time_close);
				$today = new DateTime(); 

				?>
			</div>
			<div class="col-md-10">
				@if(Auth::user()->registered->status == 0 )
	
				<?php if($open_date > $today ){ ?>
					<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
						<h1 class="display-4">Election Page</h1>
						<p class="lead">
							Elections are starting in @include('layouts.countdown').<br> Until then, visit the page of registered <a href="{{ route('elections') }}">candidates</a> and get to know them.
						</p>

					</div>
				<?php 	}

				else if ($close_date < $today ){ ?>
					<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
						<h1 class="display-4">Election Page</h1>
						<p class="lead">
							Elections are closed Now.<br> Please check for the <a href="{{ route('results')}}">results.</a>
						</p>
					</div>
				<?php }

				else{  ?>

					<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
						<h1 class="display-4">Election Form</h1>
						<p class="lead">
							Please make sure you fill it according to your choices, if you decide to abstain, please select No interest option. To choose your candidate just click on his/her image or names.
						</p>
					</div>
					<hr>
					@include('layouts.messages_section')
					<form method="POST" action="{{ route('vote/submission', Auth::user()->id) }}">
						{{ csrf_field() }}
						@foreach($positions as $position)
						<div class="row candidates-category">
							<div class="col-md-12">
								<div class="pricing-header d-flex justify-content-start">
									<h3 class="display-4">{{ $position->name }}</h3>

								</div>
								<p class="sub-header">All registered candidates contesting for {{ $position->name }} position.</p>
								<hr>
							</div>
						</div>
						@foreach($candidates as $candidate)
						@if($candidate->position_id == $position->id)
						<div class="custom-control custom-radio custom-control-inline">
							<input class="custom-control-input" type="radio" name="{{ $position->id }}" id="{{ $candidate->id }}" value="{{ $candidate->id }}">
							<label for="{{ $candidate->id }}" class="custom-control-label">
								<img class="profile-pic" src="/uploads/avatars/{{ $candidate->user->avatar }}" style="width: 50px; border: #3b9044 0.25px solid; border-radius: 50%;">
								{{ $candidate->user->fname." ".$candidate->user->lname }}

							</label>
						</div>
						@endif
						@endforeach
						<div class="custom-control custom-radio custom-control-inline">
							<input class="custom-control-input" type="radio" name="{{ $position->id }}" id="{{ $position->name }}-none" value="0" checked>
							<label for="{{ $position->name }}-none" class="custom-control-label">
								<img class="profile-pic" src="/uploads/avatars/novote.png" style="width: 50px; border: #3b9044 0.25px solid; border-radius: 50%;">
								No Interest(Not voting)

							</label>
						</div>
						@endforeach

						<div class="form-group">
							<br>
							<br>
							<input type="submit" name="submit" class="btn btn-success btn-large" value="Vote">
						</div>
					</form>
				<?php } ?>

				@else

				<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
					<h1 class="display-4">Election Page</h1>
					<p class="lead">
						You have already voted, and you can't vote more than once.
					</p>
				</div>
				
				@endif
			</div>
		</div>

	</div>
	@endsection
