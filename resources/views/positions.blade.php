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
				<div class="row">
					@foreach($positions as $position)
					<div class="col-md-4">

						<div class="card border-success" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title">{{ $position->name }}</h5>
								<h6 class="card-subtitle mb-2 text-muted">Position</h6>
								<p class="card-text">{{ $position->criteria }}</p>
								<hr>
								<p class="card-text text-muted" style="font-size: 12px;">Added on: {{ $position->created_at }}</p>
							</div>
						</div>

					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection

