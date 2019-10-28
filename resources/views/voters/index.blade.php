@extends('layouts.eballot')
@section('pageTitle', 'Registered voters')
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
							Registered voters
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
							Manage Registered Voters
						</h2>
					</div>
					<div class="card-body">
						<div class="row pre-table">
							<div class="col-md-6">
							</div>
							<div class="col-md-6 ">
								<a class="btn btn-info float-right" href="">
									<i class="fa fa-print"></i> Print list of voters
								</a>
							</div>
						</div>
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


						<table class="table table-striped" id="registered_voters">
							<thead>
								<tr>
									<th scope="col">No.</th>
									<th scope="col">First Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Gender</th>
									<th scope="col">Registration Number</th>
									<th scope="col">Academic Class</th>
									<th scope="col">Status</th>
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
									<td>{{ $voter->status }}</td>
									<td>
										<span class="edit">
											<a class="text-primary" href="{{ route('registered_voters.edit', $voter->id) }}">Edit</a>
										</span>
										|
										<span class="delete">
											<?php $form_class = $voter->id ?>
											<a class="text-danger" href="" onclick="var result = confirm('Are you sure you want to unregister this voter?'); if( result ){ event.preventDefault(); document.getElementById('{{ $form_class }}').submit(); }">
												Delete
											</a>
											<form id="{{ $form_class }}" action="{{ route('registered_voters.destroy', $voter->id) }}" method="POST" style="display: none">
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
		$('#registered_voters').DataTable();
	} );
</script>
@endsection