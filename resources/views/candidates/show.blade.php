@extends('layouts.eballot')
@section('pageTitle', 'My Profile')
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
							<span class="intro">Names:</span> {{ $candidate->user->lname }}, {{ $candidate->user->fname }}
						</li>
						<li>
							<span class="intro">Email:</span> {{ $candidate->user->email }}
						</li>
						<li>
							<span class="intro">Registration Number:</span> {{ $candidate->user->regno }}
						</li>
						
					</ul>


				</div>
			</div>
			<div class="col-sm-8">
				
				<div>
					<h4>
						Elections Coming Soon, your profile is all set.
					</h4>
					<hr>
					<h5>
						Contesting For: <span style="color: #3b9044;">{{Auth::user()->candidate->position->name}}</span>.
					</h5>

					<h5>
						Manifesto:  <span style="color: #3b9044;">{{Auth::user()->candidate->manifesto}}</span>.
					</h5>
				</div>
			</div>
		</div>

	</div>
	@include('layouts.croppie-modal')
</div>
@endsection

@section('js')
@include('layouts.avatar-uploaderJS')

@endsection