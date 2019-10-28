@extends('layouts.eballot')
@section('pageTitle', 'Elections')
@section('content')
<div class="content ">
	<div class="container info_page">
		<div class="row">
			<div class="col-md-2" id="sidebar">
				@include('layouts.elections_sidebar')
			</div>

			<div class="col-md-10">
				<div class="elections-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
					<h1 class="display-4">All Candidates</h1>
					<p class="lead">All registered candidates are categorised based on the posion, they are contesting for.</p>
				</div>

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
				<?php $count = 0;
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
						No candidates are contesting for this position yet.
					</p>

				</div>
				@else
				<div class="row">

					<!-- Then use the number of candidates to plan how to display them using bootstrap grids -->
					@foreach($candidates as $candidate)
					@if($candidate->position_id == $position->id)
					<div class="col-md-4 d-flex justify-content-center">
						<div class="card" >
							<img class="card-img-top" src="/uploads/avatars/{{ $candidate->user->avatar }}" alt="{{ $candidate->user->fname }} {{ $candidate->user->lname }}">
							<div class="card-body">
								<h5 class="card-title">{{ $candidate->user->fname }} {{ $candidate->user->lname }}</h5>
								<p class="card-text">Class: {{ $candidate->user->class }}</p>
								<a href="{{ route('elections/candidate', $candidate->id) }}" class="btn btn-primary">Read More</a>
							</div>
						</div>
					</div>
					<?php 
					$count++;
					if($count % 3 == 0){
						echo '</div>
						<div class = "row">';
					}
					?>
					@endif
					@endforeach
				</div>
				@endif
				@endforeach

			</div>
		</div>
	</div>
</div>

@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection