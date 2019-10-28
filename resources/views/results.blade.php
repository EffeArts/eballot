@extends('layouts.eballot')
@section('pageTitle', 'Final result')
@section('content')
<div class="content ">
	<div class="container info_page">
		<div class="row">
			<div class="col-md-2" id="sidebar">
				@include('layouts.elections_sidebar')
				<?php
				date_default_timezone_set('Africa/Dar_es_Salaam');
				$Draw_time_open = "18/11/2018 19:20:00";
				$Draw_time_close = "18/11/2018 19:50:00";
				$open_date = DateTime::createFromFormat("d/m/Y H:i:s",$Draw_time_open);
				$close_date = DateTime::createFromFormat("d/m/Y H:i:s",$Draw_time_close);
				$today = new DateTime(); 

				?>
			</div>

			<div class="col-md-10">

				@if($close_date > $today)

				<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
					<h1 class="display-4">Results Page</h1>
					<p class="lead">
						Final results will ready after the elections.
					</p>
				</div>

				@else
				<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
					<h1 class="display-4">Results Page</h1>
					<p class="lead">
						Elections are closed now, and these are final results.
					</p>
				</div>
				<?php
				$Draw_time = "22/11/2018 12pm";
				$today = new DateTime();

				if($Draw_time > $today){ ?>
					<h2 class="text-center">Elections are starting in @include('layouts.countdown').<br> Until then, No live feeds available.</h2>
				<?php	}
				else{ ?>

					@foreach($positions as $position)
					<h2>{{ $position->name }}</h2>
					<hr style="color: white;">
					<div class="row">

						@foreach($candidates as $candidate)

						@if($candidate->position_id == $position->id)
						
						

						<div class="col-md-4">


							<h5 class="text-center">{{ $candidate->user->fname }} {{ $candidate->user->lname }} <br><br>
								<img class="card-img-top" src="/uploads/avatars/{{ $candidate->user->avatar }}" alt="{{ $candidate->user->fname }} {{ $candidate->user->lname }}" style="max-width: 160px;">
								<p>
									Votes:
									<span class="votes-count text-center">{{ $candidate->votes }}</span>
								</p>
								<p>
									Percentage:
									<span class="votes-count text-center">
										<?php
										$percentage = (($candidate->votes)/ $all_voters) * 100;
										$percent = number_format($percentage,2);
										echo $percent. "%";
										?>

									</span>
								</p>
								
								<hr>
								
								
							</h5>
							
						</div>
						
						@endif
						@endforeach
					</div> 
					<div class="row text-center">
						<?php
						$number = 0;

						foreach ($candidates as $candidate) {
							if($candidate->position_id == $position->id){
								$number ++;
							}

						}

						?>

						@if($number == 0)
						<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
							<p class="lead">
								No candidates contested for this position.
							</p>

						</div>
						@else
						<div class="col-md-4">
							<p>
								All registered voters:
								<span class="votes-count text-center">{{ $all_voters }}</span>
							</p>
						</div>
						<div class="col-md-4">
							<p>
								Voters who voted:
								<span class="votes-count text-center">{{ $casted_votes }}</span>
							</p>
						</div>
						<div class="col-md-4">
							<p>
								Voters who did not vote:
								<span class="votes-count text-center">{{ $lost_votes }}</span>
							</p>
						</div>
						@endif
					</div>
					<hr>
					@endforeach

				<?php } ?>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')

@endsection