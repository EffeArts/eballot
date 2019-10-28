<!DOCTYPE html>
<html>
<head>
	<title>e-Ballot</title>

	<!-- bootstrap css -->
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

	<!-- Font Awesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<!-- Jquery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<!-- JS of bootstrap -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->

	<!-- Local Scripts and styling for production -->

	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="/css/styles.css">

	<!-- font Awesome css-->
	<link rel="stylesheet" type="text/css" href="/fontawesome/css/all.min.css">

	<!-- Local bootstrap css -->
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

	<!-- Jquery -->
	<script type="text/javascript" src="/js/jquery.min"></script>

	<!-- Bootstrap Js -->
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<!-- font Awesome js-->
	<script type="text/javascript" src="/fontawesome/js/all.min.js"></script>

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#"><img class="logo" src="images/Logo-white.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div id="navbarNavDropdown" class="navbar-collapse collapse">
			<ul class="navbar-nav mr-auto">
				<!-- to make sure that stuff are aligned on the right -->
			</ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">Register</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="content front-page container">

		<h1 class="front-page-title text-center">eballot</h1>
		<div class="row text-center">
			<div class="col-md-4">
				<h4>Easy</h4>
			</div>
			<div class="col-md-4">
				<h4>Secure</h4>
			</div>
			<div class="col-md-4">
				<h4>Reliable</h4>
			</div>
		</div>
	</div>


	<footer class="pt-4 my-md-5 pt-md-5 border-top container">
		<div class="row">
			<div class="col-12 col-md">
				<img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
				<small class="d-block mb-3 text-muted"><img class="bottom-logo" src="images/Logo.png"> 
					<br>effe Arts, Copyright 2018</small>
				</div>
				<div class="col-6 col-md">
					<h5>Features</h5>
				</div>
				<div class="col-6 col-md">
					<h5>Resources</h5>
				</div>
				<div class="col-6 col-md">
					<h5>About</h5>
				</div>
			</div>
		</footer>



	</body>
	</html>