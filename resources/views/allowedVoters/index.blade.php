@extends('layouts.eballot')
@section('pageTitle', 'Allowed voters')
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
							Allowed voters
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
							Manage Allowed Voters
						</h2>
					</div>
					<div class="card-body">
						<div class="row pre-table">
							<div class="col-md-6">
								<a class="btn btn-primary" href="{{route('allowed_voters.create')}}">
									<i class="fa fa-user-plus"></i> Add a new voter
								</a>
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


						<table class="table table-striped" id="all_voters">
							<thead>
								<tr>
									<th scope="col">No.</th>
									<th scope="col">First Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Registration Number</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $counter = 1; ?>
								@foreach($voters as $voter)

								<tr>
									<th scope="row">{{ $counter }}</th>
									<?php $counter++; ?>
									<td>{{ $voter->fname }}</td>
									<td>{{ $voter->lname }}</td>
									<td>{{ $voter->regno }}</td>
									<td>
										<span class="edit">
											<a class="text-primary" href="{{ route('allowed_voters.edit', $voter->id) }}">Edit</a>
										</span>
										|
										<span class="delete">
											<?php $form_class = $voter->id ?>
											<a class="text-danger" href="" onclick="var result = 
											confirm('Are you sure you want delete this voter?');
											if( result ){
												event.preventDefault();
												document.getElementById('{{ $form_class }}').submit();
												//$('{{ $form_class }}').submit();
											}">
											Delete
										</a>
										<?php  //var_dump($voter->id); ?>
										<form id="{{ $form_class }}" action="{{ route('allowed_voters.destroy', $voter->id) }}" method="POST" style="display: none">
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
@endsection

@section('js')
<script type="text/javascript">
	$(document).ready( function () {
		$('#all_voters').DataTable();
	} );

	
	
</script>
@endsection