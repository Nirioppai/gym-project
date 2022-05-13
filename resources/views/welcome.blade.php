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

@section('mainContent')
	{{-- <div class="p-5 border">
		<p>
			Featured Gyms
		</p>
	</div>

	<div class="p-5 border">
		<p>
			FOR POTENTIAL MEMBERS
			<br />

			EXPLORE HUNDREDS OF GYMS

			<br />

			excuses don't kill the fat, exercies do. join our membership today in just 4 easy steps!

		</p>
	</div>



	<div class="p-5 border">
		<p>
			Lorem ipsum dolor sit amet consectetur adipisicing elit.
			Necessitatibus veniam ipsa earum quibusdam, atque ipsum error maiores
			natus iusto fugit id saepe neque rerum magni laudantium accusantium
			dolorem numquam quasi. df
		</p>
	</div> --}}
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
