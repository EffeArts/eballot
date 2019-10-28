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
						<li>
							<span class="intro">Registration Number:</span> {{ Auth::user()->candidate->regno }}
						</li>
						<li>
							<span class="intro">Gender:</span> {{ Auth::user()->registered->gender }}
						</li>
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

				@if(Auth::user()->candidate->manifesto == NUll)
				<div>
					<h4>
						Elections Coming Soon, Just in @include('layouts.countdown').
					</h4>
					<hr>
					<p> You have been allowed to participate in the coming elections as a candidate, please 
						<a href="{{ route('candidate_profile', [Auth::user()->id])}}">
							click this link to finish up your profile.
						</a>
					</p>
				</div>
				@else
				<div>
					<h4>
						Elections Coming Soon, Just in @include('layouts.countdown') and your profile is all set.
					</h4>
					<hr>
					<h5>
						You are contesting for the position of <span style="color: #3b9044;">{{Auth::user()->candidate->position->name}}</span>.
					</h5>

					<h5>
						<blockquote class="blockquote">
							Your manifesto:  

							<footer class="blockquote-footer">
								<span style="color: #3b9044;">{{Auth::user()->candidate->manifesto}}</span>
							</footer>
						</blockquote>
					</h5>

					<hr>

					<a href="{{ route('candidate_profile', [Auth::user()->id])}}"> Edit profile </a>
				</div>
				@endif
			</div>
		</div>

	</div>
</div>
@include('layouts.croppie-modal')
@endsection

@section('js')
@include('layouts.avatar-uploaderJS')

@endsection