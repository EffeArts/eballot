@extends('layouts.eballot')
@section('pageTitle', 'Live Status')
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
				@if($open_date > $today)
				
				<h2 class="text-center">Elections are starting in @include('layouts.countdown').<br> Until then, No live feeds available.</h2>
				@else

				@foreach($positions as $position)
				<h2>{{ $position->name }}</h2>
				<hr style="color: white;">
				<div class="row  dark-background">
					
					@foreach($candidates as $candidate)

					@if($candidate->position_id == $position->id)
					<div class="col-md-4">
						<h3>
							<img class="card-img-top" src="/uploads/avatars/{{ $candidate->user->avatar }}" alt="{{ $candidate->user->fname }} {{ $candidate->user->lname }}">
						</h3>
						<p>
							Current votes count: 
							<br>
							<span class="votes-count text-center">{{ $candidate->votes }}<span>
							</p>

							<h3>{{ $candidate->user->fname }} {{ $candidate->user->lname }}</h3>
						</div>
						@endif
						@endforeach
					</div> 
					@endforeach

				@endif

				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('js')
	@if($open_date > $today)
	<script type="text/javascript">
		setTimeout(function() {
			location.reload();
		}, 50000);
	</script>
	@endif
	@endsection