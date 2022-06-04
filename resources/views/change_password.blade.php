@extends('layouts.member')

@section('title')
	VS Gym - Welcome
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
				<h1 class="barlow banner-header">My <span class="color-orange">Account</span></h1>

				<p class="poppins">Your one stop for all of your membership needs and more!</p>
			</div>


		</div>

	</div>
@endsection

@section('mainContent')
	<div class="container">
		<form action="{{ route('password-change-member') }}" name="password-change-form" id="password-change-form"
			method="post">
			@csrf

			@if (session('success'))
				<div class="alert alert-success">
					<div class="text-white">{{ session('success') }}</div>
				</div>
			@endif

			@if (session('error'))
				<div class="alert alert-danger">
					<div class="text-white">{{ session('error') }}</div>
				</div>
			@endif

			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Current Password</label>
				<input class="form-control @error('old_password') is-invalid @enderror" id="old_password" type="password"
					name="old_password" required="required" />

				@error('old_password')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>

			<div class="mb-3">
				<label for="password" class="form-label">New Password</label>
				<input class="form-control @error('new_password') is-invalid @enderror" id="new_password" type="password"
					name="new_password" required="required" autocomplete="new_password" />

				@error('new_password')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>

			<!-- Confirm Password -->
			<div class="mb-3">
				<label for="password" class="form-label">Confirm Password</label>
				<input class="form-control  @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation"
					type="password" name="new_password_confirmation" required="required" />

				@error('new_password_confirmation')
					<span class="text-danger">{{ $message }}</span>
				@enderror
			</div>

			<button class="btn btn-orange text-end" type="submit">Submit</button>
		</form>

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

	<!-- jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	 integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
	 crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- owl carousel -->
	<script src="{{ asset('js/owl.carousel.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
@endsection
