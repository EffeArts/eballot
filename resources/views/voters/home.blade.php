@extends('layouts.eballot')
@section('pageTitle', 'Home')
@section('content')
<div class="content ">
	<div class="container info_page">
		<div class="row">
			<div class="col-sm-4">
				<img class="profile-pic" src="/uploads/avatars/{{ Auth::user()->avatar }}">
				<br>
				<br>
				<a href="#" id="avatar_selector">Change profile picture.</a>
				<br>
				<input type="file" name="avatar" id="avatar" class="avatar" style="display: none;">

				<br>
				<div class="personal_info">
					<ul class="list-unstyled">
						<li>
							<span class="intro">Names:</span> {{ Auth::user()->lname }}, {{ Auth::user()->fname }}
						</li>
						<li>
							<span class="intro">Email:</span> {{ Auth::user()->email }}
						</li>
						<li><span class="intro">Registration Number:</span> {{ Auth::user()->regno }}</li>
						<li><span class="intro">Gender: </span>{{ Auth::user()->gender }}</li>
					</ul>


				</div>
			</div>
			<div class="col-sm-8">
				@foreach (['danger', 'warning', 'success', 'info'] as $msg)
				@if(Session::has($msg))

				<div class="alert alert-{{ $msg }}  alert-dismissible fade show" role="alert">
					{{ Session::get($msg) }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
				@endforeach
				<h4>
					Elections Starting in @include('layouts.countdown')
				</h4>

				<hr>
				
				<p class="text-center">
					Our online voting system gets you the results you need to make the important decisions. Using our online voting system, eligible voter sare able to cast their votes from anywhere, using any device. We ensure your data is secure, backed up, and there when you need it. Our convenient approach means a more enjoyable voting experience.
				</p>
				
			</div>
		</div>

	</div>
</div>
@include('layouts.croppie-modal')
@endsection

@section('js')
@include('layouts.avatar-uploaderJS')

@endsection