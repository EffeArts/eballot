@extends('layouts.eballot')
@section('pageTitle', 'Admin')
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
							<span class="intro">Registration Number:</span>
							 {{ Auth::user()->regno }}
						</li>
						<li>
							<span class="intro">Gender:</span> 
							{{ Auth::user()->gender }}
						</li>
					</ul>


				</div>
			</div>
			<div class="col-sm-8">
				
				<h1>{{ Auth::user()->role->name }}</h1>
				<hr>
				<p>
					With the role you have, you can:
					<ol>
						<li>Manage allowed voters.</li>
						<li>Manage all registered voters.</li>
						<li>Manage all election's positions.</li>
						<li>Manage all election's candidates.</li>
						<li>Manage all election's processes.</li>
					</ol>
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