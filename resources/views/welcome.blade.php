@extends('layouts.visitor')

@section('title')
	VS Gym - Welcome
@endsection

@section('styles')
	<style>
		.banner-image {
			background-image: url('img/banner-img.jpeg');
			background-size: cover;
		}

	</style>
	<script src="https://kit.fontawesome.com/d3fbd9c521.js" crossorigin="anonymous"></script>
@endsection

@section('navbar')
	<div class="collapse navbar-collapse" id="navbarNav">
		<div class="mx-auto"></div>
		<ul class="navbar-nav">

			<li class="nav-item">
				<a id="navtext4" class="nav-link text-light" href="{{ route('register') }}">Join us</a>
			</li>

			<li class="nav-item dropdown">
				<a id="navtext5" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
					aria-expanded="false">
					Login
				</a>
				<ul id="navdrop" class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">

					<li><a class="dropdown-item" href="{{ route('login') }}">Login as Gym User</a></li>
					<li><a class="dropdown-item" href="{{ route('staff.login') }}">Login as Gym Admin</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
@endsection

@section('bannerContent')
	<div class="container  text-white">
		<div class="row">
			<div class="col">
				<div class="row">
					<div class="col landingHeader">
						Get The <span class="orangeHeader"> Fitness</span>
						<br />
						You Deserve
					</div>
				</div>
				<br />

				<div class="row">
					<div class="col">
						<span class="landingSecondary">Whether you’re just starting out or an old hand, you’ll find
							what you need for your fitness
							journey.</span>
					</div>
				</div>

				<br />


				<div class="row text-center">
					<div class="col">
						<div class="row">
							<div class="col">
								<span class="landingMetricCount">
									2m+
								</span>
							</div>
						</div>
						<div class="row">
							<div class="col">
								Total Customers
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<span class="landingMetricCount">
								500k+
							</span>
						</div>
						<div class="row">
							<div class="col">
								Successful Memberships
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<span class="landingMetricCount">
								30+
							</span>
						</div>
						<div class="row">
							<div class="col">
								Participating Gyms
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<img width="100%" src="{{ asset('img/svg/1.svg') }}" alt="svg1">
			</div>
		</div>
	</div>
@endsection

@section('beforeMainContent')
	<div class="masthead" style="background-image: url('{{ asset('img/banner-half-img-white.jpg') }}');">
		<div class="color-overlay d-flex flex-column justify-content-center text-left ">
			<div class="container ">
				<h1 class="barlow banner-header text-dark">Explore a different way to get the most out of your <span
						class="color-orange">Fitness Journey</span>.</h1>

				<span class="poppins text-dark subcaption">Different gyms provides different plans that suit your needs.</span>
			</div>


		</div>

	</div>
@endsection

@section('mainContent')
	<div class="p-5">

		<div class="container">
			<div class="row">
				<div class="col text-center">
					<i class="fa fa-solid fa-user-tie big-icon text-orange"></i>
					<br />
					<br />
					<h5 class="barlow">Professional Gyms</h5>
				</div>
				<div class="col text-center">
					<i class="fa-solid fa-thumbs-up big-icon text-orange"></i>
					<br />
					<br />
					<h5 class="barlow">Customer Satisfaction</h5>
				</div>
				<div class="col text-center">
					<i class="fa fa-solid fa-shield-cat big-icon text-orange"></i>
					<br />
					<br />
					<h5 class="barlow">Secure Payment</h5>
				</div>
			</div>
		</div>

	</div>
@endsection

@section('afterMainContent')
	<div class="masthead" style="background-image: url('{{ asset('img/banner-half-img.jpg') }}');">
		<div class="color-overlay d-flex flex-column justify-content-center text-start float-start">
			<div class="container ">
				<h1 class="barlow banner-header">Signup for <span class="color-orange">Newsletter</span></h1>

				<p class="poppins">Sign up now to receive hot special offers
					and information about the best Gyms and Plans!

				</p>

				<div class="input-group mb-3 float-start">
					<input type="text" class="form-control short-input " placeholder="Enter your email"
						aria-label="Recipient's username" aria-describedby="button-addon2">
					<button class="btn btn-orange" type="button" id="button-addon2">></button>
				</div>


			</div>


		</div>

	</div>
@endsection

@section('bodyScript')
	<script type="text/javascript">
	 var nav = document.getElementById('nav');
	 var navtext1 = document.getElementById('navtext1')
	 var brandnav = document.getElementById('brandnav')
	 var navdrop = document.getElementById('navdrop')

	 window.addEventListener('scroll', function() {
	  if (window.pageYOffset > 100) {
	   nav.classList.add('bgFrosty', 'shadow');
	   navtext4.classList.add('text-dark');
	   navtext5.classList.add('text-dark');
	   brandnav.classList.add('text-dark');
	   navdrop.classList.remove('dropdown-menu-dark')
	  } else {
	   nav.classList.remove('bgFrosty', 'shadow');
	   navtext4.classList.remove('text-dark');
	   navtext5.classList.remove('text-dark');
	   brandnav.classList.remove('text-dark');
	   navdrop.classList.add('dropdown-menu-dark')
	  }
	 });
	</script>
@endsection
