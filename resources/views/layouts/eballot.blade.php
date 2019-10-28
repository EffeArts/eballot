<!DOCTYPE html>
<html>
<head>
	<title>@yield('pageTitle')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon --> 
	<link rel="icon" href="/images/favicon.ico"> 
	<!-- bootstrap css -->
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

	<!-- Font Awesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<!-- Jquery -->
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	-->
	<!-- JS of bootstrap -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->

	<!-- Local Scripts and styling for production -->

	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="/css/styles.css">

	<!-- font Awesome css-->
	<link rel="stylesheet" type="text/css" href="/fontawesome/css/all.min.css">

	<!-- Local bootstrap css -->
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

	<!-- Local croppie css -->
	<link rel="stylesheet" type="text/css" href="/css/croppie.css">

	<!-- Jquery -->
	<script type="text/javascript" src="/js/jquery.min.js"></script>

	

	<!-- font Awesome js-->
	<script type="text/javascript" src="/fontawesome/js/all.min.js"></script>

	

	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css"/>

	<script type="text/javascript" src="/DataTables/datatables.min.js"></script>

	<!-- Croppie js-->
	<script type="text/javascript" src="/js/croppie.js"></script>

	<!-- Bootstrap Js -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap-filestyle.min.js"> </script>

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#"><img class="logo" src="/images/Logo-white.png" style="max-height: 40px;"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="navbarNavDropdown" class="navbar-collapse collapse">
			<ul class="navbar-nav mr-auto">
				<!-- to make sure that stuff are aligned on the right -->
			</ul>
			<ul class="navbar-nav">
				@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">Register</a>
				</li>
				@else
				
				<li class="nav-item">
					<a class="nav-link" href="/home">Home</a>
				</li>
				<!-- The switch case below is for checking the role of the user and display the menu accordingly -->
				@switch(Auth::user()->role_id)
				@case(1)
				<li class="nav-item">
					<a class="nav-link" href="{{ route('sudo') }}">My profile</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{ route('users.index') }}">Users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">Roles</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('positions.index') }}">Positions</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('elections') }}">Elections</a>
				</li>
				@break
				
				@case(2)
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin') }}">My profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('allowed_voters.index') }}">Manage users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('positions.index') }}">Positions</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('elections') }}">Elections</a>
				</li>

				@break

				@case(3)
				<li class="nav-item">
					<a class="nav-link" href="{{ route('candidate') }}">My profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('elections') }}">Elections</a>
				</li>
				@break
				@case(4)
				<li class="nav-item">
					<a class="nav-link" href="{{ route('voter') }}">My profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('elections') }}">Elections</a>
				</li>
				@break
				@case(5)
				<li class="nav-item">
					<a class="nav-link" href="{{ route('guest') }}">My profile</a>
				</li>
				@break

				@endswitch

				<li class="nav-item">
					<a class="nav-link" href="">About</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
						Logout
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</li>
				@endguest
			</ul>
		</div>
	</nav>
	@yield('content')

	<footer class="pt-4 my-md-5 pt-md-5 border-top container">
		<div class="row">
			<div class="col-12 col-md">
				<small class="d-block mb-3 text-muted">
					<img class="bottom-logo" src="/images/Logo.png"> 
					<br>effe Arts, Copyright 2018
				</small>
			</div>
			
		</div>
	</footer>


	@yield('js')
</body>
</html>