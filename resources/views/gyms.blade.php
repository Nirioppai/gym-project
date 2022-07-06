@extends('layouts.member')

@section('title')
	VS Gym - Gyms
@endsection

@section('styles')
	<script src="https://kit.fontawesome.com/d3fbd9c521.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{ asset('css/member-custom.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
@endsection

@section('navbar')
	<div class="collapse navbar-collapse" id="navbarNav">
		<div class="mx-auto"></div>
		<ul class="navbar-nav">

			<li class="nav-item dropdown">
				<a id="navtext4" class="nav-link text-light" href="#"> </a>
			</li>

			<li class="nav-item dropdown">
				<a id="navtext5" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
					aria-expanded="false">
					<i class="fa fa-gear cursor-pointer"></i>
				</a>
				<ul id="navdrop" class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">

					<li>
						<a class="dropdown-item" href="/pw/change/member"><i class="fa-solid fa-unlock"></i>
							Edit Password</a>
					</li>

					<li>
						<a class="dropdown-item" href="/user-logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>
							Logout</a>
					</li>

				</ul>
			</li>
		</ul>
	</div>
@endsection

@section('banner')
	<div class="masthead" style="background-image: url('{{ asset('img/banner-half-img.jpg') }}');">
		<div class="color-overlay d-flex flex-column justify-content-center text-left ">
			<div class="container ">
				<h1 class="barlow banner-header">View <span class="color-orange">Gyms</span></h1>

				<p class="poppins">Edit this description</p>
			</div>


		</div>

	</div>
@endsection

@section('mainContent')
	<div class="container">

		<form>
			<div class="input-group mb-3">

				<input type="text" class="form-control" placeholder="Search for Gym Name, Location"
					aria-label="Recipient's username" aria-describedby="button-addon2">
				<button class="btn btn-orange" type="submit" id="button-addon2">Search</button>
			</div>
		</form>


		<div class="row g-4 my-5 mx-auto owl-carousel owl-theme">

			@foreach ($gyms as $gym)
				<div class="col product-item mx-auto">
					<div class="product-img">
						<img src="{{ asset('storage/gym_images/' . $gym->gym_image) }}" alt=""
							class="img-fluid d-block mx-auto" />

						<div class="row btns w-100 mx-auto text-center">

							<button type="button" onclick="window.location.href='/gym/{{ $gym->gym_id }}'">


								<i class="fa-solid fa-badge-check"></i> Register as Member</button>


						</div>
					</div>

					<div class="product-info p-3">
						<span class="product-type">{{ $gym->gym_location }}</span>
						<a href="/gym/{{ $gym->gym_id }}"
							class="d-block text-dark text-decoration-none py-2 product-name">{{ $gym->gym_name }}</a>

					</div>
				</div>
			@endforeach






		</div>
	</div>

	{{-- <div class="p-5 border">
		<p>
			FOR POTENTIAL MEMBERS
			<br />

			EXPLORE HUNDREDS OF GYMS

			<br />

			excuses don't kill the fat, exercies do. join our membership today in just 4 easy steps!

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

	<!-- jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	 integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
	 crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- owl carousel -->
	<script src="{{ asset('js/owl.carousel.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
@endsection
