@extends('layouts.eballot')
@section('pageTitle', 'Candidates')
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
							Candidates
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
							Manage Candidates
						</h2>
					</div>
					<div class="card-body">
						<div class="row pre-table">
							<div class="col-md-6">
								<a class="btn btn-primary" href="{{route('candidates.add')}}">
									<i class="fa fa-user-plus"></i> Add a new candidate
								</a>
							</div>
							<div class="col-md-6 ">
								<a class="btn btn-info float-right" href="">
									<i class="fa fa-print"></i> Print list of voters
								</a>
							</div>
						</div>
						@include('layouts.messages_section')


						<table class="table table-striped" id="all_candidates">
							<thead>
								<tr>
									<th scope="col">No.</th>
									<th scope="col">First Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Registration Number</th>
									<th scope="col">Position</th>
									<th scope="col">Votes</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $counter = 1; ?>
								@foreach($candidates as $candidate)

								<tr>
									<th scope="row">{{ $counter }}</th>
									<?php $counter++; ?>
									<td>{{ $candidate->user->fname }}</td>
									<td>{{ $candidate->user->lname }}</td>
									<td>{{ $candidate->user->regno }}</td>
									<td>{{ $candidate->position->name }}</td>
									<td>{{ $candidate->votes }}</td>
									<td>
										<span class="delete">
											<?php $form_class = $candidate->id ?>
											<a class="text-danger" href="" onclick="var result = confirm('Are you sure you want delete this candidate?'); if( result ){ event.preventDefault(); document.getElementById('{{ $form_class }}').submit(); }">
												Delete
											</a>
											<?php  //var_dump($voter->id); ?>
											<form id="{{ $form_class }}" action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" style="display: none">
												<input type="hidden" name="_method" value="delete">
												{{csrf_field()}}

											</form>

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
		$('#all_candidates').DataTable();
	} );

	
	
</script>
@endsection