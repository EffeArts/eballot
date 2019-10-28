@extends('layouts.eballot')
@section('pageTitle', 'All users')
@section('content')
<div class="content">
	<div class="container info_page">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="#">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							All users
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
							Manage Users
						</h2>
					</div>
					<div class="card-body">
						<div class="row pre-table">
							<div class="col-md-6">

							</div>
							<div class="col-md-6 ">
								<a class="btn btn-info float-right" href="">
									<i class="fa fa-print"></i> Print list of users
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

						<table class="table table-striped" id="all_users">
							<thead>
								<tr>
									<th scope="col">No.</th>
									<th scope="col">First Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Email</th>
									<th scope="col">Role</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $counter = 1; ?>
								@foreach($users as $user)

								<tr>
									<th scope="row">{{ $counter }}</th>
									<td>{{ $user->fname }}</td>
									<td>{{ $user->lname }}</td>
									<td>{{ $user->email }}</td>

									<td>
										<!-- for the role column it displays the role name rather than the user_id -->
										{{ $user->role->name }}

									</td>
									<td>
										<span class="edit">
											<a class="text-primary" href="{{ route('users.edit', $user->id) }}">
												Edit
											</a>
										</span>
										|
										<span class="delete">
											<a class="text-danger" href="">Delete</a>
										</span>
									</td>
								</tr>
								<?php $counter++; ?>
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
		$('#all_users').DataTable();
	} );
</script>
@endsection