@extends('layouts.eballot')
@section('pageTitle', 'Add a candidate')
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
							Select a new candidate
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2" id="sidebar">
				@include('layouts.sidebar')
			</div>
			<div class="col-md-10">
				<div class="card border-success">
					<div class="card-header border-success">
						<h2>
							Select a pontential candidate
						</h2>
					</div>
					<div class="card-body">
						@include('layouts.messages_section')

						<table class="table table-striped" id="registered_voters">
							<thead>
								<tr>
									<th scope="col">No.</th>
									<th scope="col">First Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Gender</th>
									<th scope="col">Registration Number</th>
									<th scope="col">Academic Class</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $counter = 1; ?>
								@foreach($voters as $voter)

								<tr>
									<th scope="row">{{ $counter }}</th>
									<?php $counter++; ?>

									<td>
										<a href="{{ route('registered_voters.show', $voter->id) }}">
											{{ $voter->user->fname }}
										</a>
									</td>
									<td>{{ $voter->user->lname }}</td>
									<td>{{ $voter->user->gender }}</td>
									<td>{{ $voter->user->regno }}</td>
									<td>{{ $voter->user->class }}</td>
									<td>
										<span class="edit">
											<a href="{{ route('candidates.creation', $voter->id) }}" class="btn btn-success <?php foreach ($candidates as $candidate) {
													if($candidate->user_id == $voter->user_id){
														echo "disabled";
													}
												}?> ">Add as a candidate</a>
										</span>
										
									</td>
								</tr>

								@endforeach
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$(document).ready( function () {
		$('#registered_voters').DataTable();
	} );
</script>
@endsection