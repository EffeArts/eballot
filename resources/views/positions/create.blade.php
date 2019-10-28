@extends('layouts.eballot')
@section('pageTitle', 'Create a position')
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
							<a href="{{ route('positions.index') }}">Positions</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Create a new position
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2 collapse d-md-flex bg-faded pt-2 h-100" id="sidebar">
				<!-- @include('layouts.sidebar') -->
			</div>
			<div class="col-sm-10">
				<h2>
					Create a new position
					<hr>
				</h2>
				<form method="POST" action="{{ route('positions.store') }}">
					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
						<label for="mame" class="col-sm-2">Position Title</label>
						<div class="col-sm-10">
							<input id="name" class="form-control" placeholder="Position Title" required autofocus type="text" name="name" value="{{ old('name') }}">
							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
						
					</div>

					<div class="form-group{{ $errors->has('criteria') ? ' has-error' : '' }} row">
						<label for="criteria" class="col-sm-2">Position's Criteria</label>
						<div class="col-sm-10">
							<div class="form-group">

								<textarea class="form-control" rows="3" id="criteria" name="criteria"></textarea>
								@if ($errors->has('criteria'))
								<span class="help-block">
									<strong>{{ $errors->first('criteria') }}</strong>
								</span>
								@endif
							</div>

						</div>
					</div>
						<button class="btn btn-primary float-right" type="submit">Create</button>

				</form>
			</div>
		</div>

	</div>
</div>
@endsection
