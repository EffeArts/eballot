
@extends('layouts.eballot')
@section('pageTitle', 'Candidate')
@section('content')
<div class="content ">
	<div class="container info_page">
		<div class="row">
			<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
				<img class="profile-pic" src="/uploads/avatars/{{ $candidate->user->avatar }}">
				<h1 class="display-4">{{ $candidate->user->lname." ".$candidate->user->fname }}</h1>
				<p class="lead">
					<span style="color: #3b9044">Class:</span> {{ $candidate->user->class }}
					<br>
					<span style="color: #3b9044">Gender:</span> {{ $candidate->user->gender }}
					<br>
					<span style="color: #3b9044">Reg. No:</span> {{ $candidate->user->regno }}
					<br>
					<span style="color: #3b9044">Position:</span> {{ $candidate->position->name }}
				</p>
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 mx-auto text-center">
				<blockquote class="quote-card blue-card">
              <p>
                {{ $candidate->manifesto }}
              </p>
        
              <cite>
                Vote for me
              </cite>
            </blockquote>
			</div>
		</div>

	</div>
</div>
@endsection
