@extends('layouts.eballot')
@section('pageTitle', 'Add candidate')
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
							<a href="{{ route('candidates.index') }}">Candidates</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							<a href="{{ route('candidates.add') }}">Select a new candidate</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Add new candidate
						</li>
					</ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2 collapse d-md-flex bg-faded pt-2 h-100" id="sidebar">
				@include('layouts.sidebar')
			</div>
			<div class="col-sm-10">
				<h2>
					Add a new candidate
					<hr>
				</h2>
				@include('layouts.messages_section')
				<form method="POST" action="{{ route('candidates.store') }}">
					{{ csrf_field() }}

					<div id="cid" class="form-group" >
						<div class="col-sm-9" id=ID">
							<input id='user_id' class='form-control' required type='text' name='user_id' value="{{ $candidate->user->id }}" style="display: none;">
						</div>
					</div>
					

					<div class="form-group row" id="cfn">
						<label for="fname" class="col-sm-3">Candidate's First Name.</label>
						<div class="col-sm-9" id="firstName">
							<input id='fname' class='form-control' required type='text' name='fname' value="{{ $candidate->user->fname }}" disabled>
						</div>
					</div>

					<div class="form-group row" id="cln">
						<label for="fname" class="col-sm-3">Candidate's Last Name.</label>
						<div class="col-sm-9" id="lastName">
							<input id='lname' class='form-control' required type='text' name='lname' value=" {{ $candidate->user->lname}}" disabled>
						</div>
					</div>
					<div class="form-group{{ $errors->has('position') ? ' has-error' : '' }} row"  id="psn">
						<label for="class" class="col-sm-3">Select Position</label>
						<div class="col-sm-9">
							<select class="form-control" name="position" required>
								<option selected disabled>
									Choose
								</option>

								@foreach($positions as $position)
								<option value="{{$position->id}}">
									{{ $position->name }}
								</option>
								@endforeach

								@if ($errors->has('position'))
								<span class="help-block">
									<strong>{{ $errors->first('position') }}</strong>
								</span>
								@endif
							</select>
						</div>

					</div>
					<div class="float-right">
						
						<button class="btn btn-success float-right" type="submit">Register</button>
					</div>


					<!-- <button class="btn btn-primary " type="submit">Register</button> -->
					
				</form>
			</div>
		</div>

	</div>
</div>
@endsection

<!-- @section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('#ajaxCheck').click(function(e){
			e.preventDefault();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			jQuery.ajax({
				url: "{{ route('candidates_check') }}",
				method: 'POST',
				data: {
					regno: $('#regno').val()
				},
				dataType: 'json',
				encode: true,
				success: function(response){
					// $('#cfn').show();
					// $('#cln').show();
					// $('#psn').show();
					var fname = response[0].fname;
					var lname = response[0].lname;
					var user_id = response[0].id;

					//Displaying the Ajax response
					var code1 = "<input id='fname' class='form-control' required type='text' name='fname' value=" + fname +" disabled>";
					$("#fname").value().replaceWith(fname);

					var code2 = "<input id='lname' class='form-control' required type='text' name='lname' value=" + lname +" disabled>";
					$("#lastName").replaceWith(code2);

					var code3 = "<input id='user_id' class='form-control' required type='text' name='user_id' value="+ user_id +" disabled style='display: none;'>";
					$("#cid").replaceWith(code3);

				}});
		});
	});
</script>
@endsection -->
