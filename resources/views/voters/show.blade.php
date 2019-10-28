@extends('layouts.eballot')
@section('pageTitle', 'Registered Voter Info')
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
							Registered voter's information
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
					<span class="text-info">{{ $voter->user->lname }}, {{ $voter->user->fname }} </span>
					<hr>
				</h2>
				@include('layouts.messages_section')
				<div class="row">
					<div class="col-md-4">
						<h4>Full Names:</h4>
					</div>
					<div class="col-md-4">
						<h5> {{ $voter->user->fname }} </h5>
					</div>
					<div class="col-md-4">
						<h5>{{ $voter->user->lname }}</h5>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<span class="col-6">
							<h5>Gender</h5>
						</span>
						<span class="col-6">
							<h5>{{ $voter->user->gender }}</h5>
						</span>
					</div>
					<div class="col-md-4">
						<span class="col-6">
							<h5>Registration Number</h5>
						</span>
						<span class="col-6">
							<h5>{{ $voter->user->regno }}</h5>
						</span>
					</div>
					<div class="col-md-4">
						<span class="col-6">
							<h5>Class</h5>
						</span>
						<span class="col-6">
							<h5>{{ $voter->user->class }}</h5>
						</span>
					</div>
				</div>
				<div class="row">
					<span class="col-6">
						<a class="btn btn-primary" href="{{ route('registered_voters.edit', $voter->id) }}">Edit</a>
					</span>

					<span class="col-6">
						<a class="btn btn-danger" href="">Delete</a>
					</span>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
