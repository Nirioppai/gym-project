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
		@if (!$active_member_plans->isEmpty())
			<div class="row my-5">
				<h1 class="text-start">Your <span class="color-orange">Active Plans</span></h1>

				@foreach ($active_member_plans as $active_member_plan)
					<!-- Modal -->
					<div class="modal fade" id="exampleModal{{ $active_member_plan->payment_id }}" tabindex="-1"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">{{ $active_member_plan->payment_id }} Details</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<b>Member Address</b>: {{ $active_member_plan->member_address }}<br />
									<b>Member Gender</b>: {{ $active_member_plan->member_gender }}<br />
									<b>Member Date of Birth</b>: {{ $active_member_plan->member_date_of_birth }}<br />
									<b>Member Phone Number</b>: {{ $active_member_plan->member_phone_number }}<br />
									<b>Member Payment Method</b>: {{ $active_member_plan->member_payment }}<br />
									<b>Member Height</b>: {{ $active_member_plan->health_height }}<br />
									<b>Member Weight</b>: {{ $active_member_plan->health_weight }}<br />
									<b>Member Waistline</b>: {{ $active_member_plan->health_waist }}<br />
									<b>Member Health Remarks</b>: {{ $active_member_plan->health_remarks }}<br />
								</div>

							</div>
						</div>
					</div>


					<div class="alert alert-warning" role="alert">
						<div class="container">
							<div class="row">
								<div class="col text-start">
									Plan: {{ $active_member_plan->plan_name }}
								</div>
								<div class="col text-end">
									Start Date:

									{{ \Carbon\Carbon::parse($active_member_plan->created_at)->format('jS F y') }}
								</div>
							</div>
							<div class="row">
								<div class="col text-start">
									Status: {{ $active_member_plan->member_status }}
								</div>
								<div class="col text-end">
									Expiry Date: {{ \Carbon\Carbon::parse($active_member_plan->member_expiry_date)->format('jS F y') }}
								</div>
							</div>
							<div class="row">
								<div class="col text-start">

								</div>
								<div data-bs-toggle="modal" data-bs-target="#exampleModal{{ $active_member_plan->payment_id }}"
									class="col text-end">
									<a href="#" class="link-primary">More Details</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@endif



		@if (!$other_plans->isEmpty())
			<div class="row my-5">
				<h1 class="text-start">Your <span class="color-orange">Other Plans</span></h1>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Plan</th>
								<th scope="col">Status</th>
								<th scope="col">Start Date</th>
								<th scope="col">End Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($other_plans as $other_plan)
								<tr>
									<th scope="row">{{ $other_plan->plan_name }}</th>
									<td>{{ $other_plan->member_status }}</td>
									<td>{{ \Carbon\Carbon::parse($other_plan->created_at)->format('jS F y') }}</td>
									<td>{{ \Carbon\Carbon::parse($other_plan->member_expiry_date)->format('jS F y') }}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		@endif

		@if ($gyms->isEmpty())
			No Available Gyms
		@endif

		@if (!$gyms->isEmpty())
			<div class="row my-5">
				<h1 class="text-start">Featured <span class="color-orange">Gyms</span></h1>
				<p class="fw-light mx-auto text-start">
					Get in touch with one of our reputable and lets help you plan your perfect routine towards fitness!
				</p>
				<div class="text-start">

					<a class="btn btn-orange" href="/gyms" role="button">View all Gyms <i
							class="fa-solid fa-arrow-right-long"></i></a>



				</div>
			</div>

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
		@endif


		{{-- <div class="row my-5">

			<div class="text-start">

				@if (!$active_member_plans->isEmpty())
					<div class="row my-5">
						<h1 class="text-start">Member <span class="color-orange">Health</span></h1>
						<p class="fw-light mx-auto text-start">
							Monitor your health here from your gym memberships!
						</p>

						@foreach ($active_member_plans as $active_member_plan)
							<div class="alert alert-warning" role="alert">
								<div class="container">
									<div class="row">
										<div class="col text-start">
											Member Height: {{ $active_member_plan->health_height }}
										</div>

									</div>
									<div class="row">
										<div class="col text-start">
											Member Weight: {{ $active_member_plan->health_weight }}
										</div>

									</div>
									<div class="row">
										<div class="col text-start">
											Member Waistline: {{ $active_member_plan->health_waist }}
										</div>

									</div>
									<div class="row">
										<div class="col text-start">
											Health Remarks: {{ $active_member_plan->health_remarks }}
										</div>

									</div>
								</div>
							</div>
						@endforeach
					</div>
				@endif



			</div>
		</div> --}}
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
