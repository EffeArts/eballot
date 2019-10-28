@extends('layouts.eballot')
@section('pageTitle', 'Edit position')
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
							Edit position 
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h2>
					Edit position - {{ $position->name }}
					<hr>
				</h2>
				<form method="POST" action="{{ route('positions.update', [$position->id]) }}">
					{{ csrf_field() }}

					<input type="hidden" name="_method" value="put">

					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
						<label for="mame" class="col-sm-2">Position Title</label>
						<div class="col-sm-10">
							<input id="name" class="form-control" placeholder="Position Title" required autofocus type="text" name="name" value="{{ $position->name }}">
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

								<textarea class="form-control" rows="3" id="criteria" name="criteria">
									{{ $position->criteria }}
								</textarea>
								@if ($errors->has('criteria'))
								<span class="help-block">
									<strong>{{ $errors->first('criteria') }}</strong>
								</span>
								@endif
							</div>

						</div>
					</div>
						<button class="btn btn-primary float-right" type="submit">Update</button>

				</form>
			</div>
		</div>

	</div>
</div>
@endsection
