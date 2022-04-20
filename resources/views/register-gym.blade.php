@extends('layouts.member')

@section('title')
	VS Gym - {{ $gym->GYM_NAME }}
@endsection

@section('styles')
	<script src="https://kit.fontawesome.com/d3fbd9c521.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{ asset('css/member-custom.css') }}">
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
				<h1 class="barlow banner-header">{{ $gym->GYM_NAME }}</h1>

				<p class="poppins">{{ $gym->GYM_LOCATION }}</p>
			</div>


		</div>

	</div>
@endsection

@section('mainContent')
	<div class="container">

		<form method="POST" action="{{ route('gym-register-member') }}" name="register-gym" id="register-gym">
			@csrf
			<nav>
				<div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
					<a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1">Step 1</a>
					<a class="nav-link" id="step2-tab" data-bs-toggle="tab" href="#step2">Step 2</a>
					<a class="nav-link" id="step3-tab" data-bs-toggle="tab" href="#step3">Step 3</a>
				</div>
			</nav>
			<div class="tab-content py-4">
				<div class="tab-pane fade show active" id="step1">
					<h4>Select Plan</h4>
					<div class="mb-3">
						<input type="hidden" name="PLAN_ID" class="form-control" id="PLAN_ID">
						<input type="hidden" name="GYM_ID" class="form-control" id="GYM_ID">

						<div class="row row-cols-1 row-cols-md-3 mb-3 text-center justify-content-center">

							@foreach ($gym_plans as $gym_plan)
								<div class="col">
									<div class="card mb-4 rounded-3 shadow-sm">
										<div class="card-header py-3">
											<h4 class="my-0 fw-normal">{{ $gym_plan->PLAN_NAME }}</h4>
										</div>
										<div class="card-body">

											@if ($loop->index <= 2)
												<img width="30%" src="{{ asset('img/' . $loop->index . '.svg') }}" alt="svg{{ $loop->index }}">
											@else
												<img width="30%" src="{{ asset('img/2.svg') }}" alt="svg{{ $loop->index }}">
											@endif



											<h1 class="card-title pricing-card-title">₱{{ $gym_plan->PLAN_AMOUNT }}<small class="text-muted fw-light">
													for {{ $gym_plan->PLAN_VALIDITY }} day/s</small></h1>
											<ul class="list-unstyled mt-3 mb-4">
												<li>{{ $gym_plan->PLAN_DESCRIPTION }}</li>

											</ul>
											<button type="button" onclick="plan_select('{{ $gym_plan->PLAN_ID }}','{{ $gym_plan->GYM_ID }}')"
												class="w-100 btn btn-lg btn-outline-primary">Choose {{ $gym_plan->PLAN_NAME }}</button>
										</div>
									</div>
								</div>
							@endforeach

						</div>


					</div>
				</div>
				<div class="tab-pane fade" id="step2">
					<h4>Personal Information</h4>
					<div class="mb-3">
						<label for="MEMBER_ADDRESS">Address</label>
						<textarea name="MEMBER_ADDRESS" rows="5" class="form-control" id="MEMBER_ADDRESS" required></textarea>
					</div>
					<div class="mb-3">
						<label for="MEMBER_GENDER">Gender</label>
						<input type="text" name="MEMBER_GENDER" class="form-control" id="MEMBER_GENDER" required>
					</div>
					<div class="mb-3">
						<label for="MEMBER_DATE_OF_BIRTH">Date of Birth</label>
						<input type="text" name="MEMBER_DATE_OF_BIRTH" class="form-control" id="MEMBER_DATE_OF_BIRTH" required>
					</div>
					<div class="mb-3">
						<label for="MEMBER_PHONE_NUMBER">Phone Number</label>
						<input type="text" name="MEMBER_PHONE_NUMBER" class="form-control" id="MEMBER_PHONE_NUMBER" required>
					</div>
				</div>
				<div class="tab-pane fade" id="step3">
					<h4>Mode of Payment</h4>
					<div class="mb-3">
						<label for="MEMBER_PAYMENT">Phone Number</label>
						<input type="text" name="MEMBER_PAYMENT" class="form-control" id="MEMBER_PAYMENT" required>
					</div>

					<div class="row row-cols-1 row-cols-md-3 mb-3 text-center justify-content-center">

						<div class="col">
							<div class="card mb-4 rounded-3 shadow-sm">
								<div class="card-header py-3">
									<h4 class="my-0 fw-normal">Gcash</h4>
								</div>
								<div class="card-body">

									<img class="mb-3" src="{{ asset('img/gcash.png') }}" alt="gcash">

									<button type="button" onclick="payment_select('gcash')" class="w-100 btn btn-outline-primary">Select</button>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="card mb-4 rounded-3 shadow-sm">
								<div class="card-header py-3">
									<h4 class="my-0 fw-normal">Paymaya</h4>
								</div>
								<div class="card-body">

									<img class="mb-3" src="{{ asset('img/paymaya.png') }}" alt="paymaya">

									<button type="button" onclick="payment_select('paymaya')" class="w-100 btn btn-outline-primary">Select</button>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="row justify-content-between">
				<div class="col-auto"><button type="button" class="btn btn-secondary"
						data-enchanter="previous">Previous</button></div>
				<div class="col-auto">
					<button type="button" class="btn btn-primary" data-enchanter="next">Next</button>
					<button type="submit" class="btn btn-primary" data-enchanter="finish">Finish</button>
				</div>
			</div>
		</form>

	</div>
@endsection

@section('bodyScript')
	<script>
	 function plan_select(id1, id2) {
	  var plan_id = id1;
	  var gym_id = id2;
	  document.getElementById("PLAN_ID").value = plan_id;
	  document.getElementById("GYM_ID").value = gym_id;
	 }

	 function payment_select(id) {
	  console.log(id);
	  var payment = id;
	  document.getElementById("MEMBER_PAYMENT").value = payment;

	 }
	</script>

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
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

	<script src="{{ asset('js/enchanter.js') }}"></script>
	<script>
	 var registrationForm = $('#register-gym');
	 var formValidate = registrationForm.validate({
	  errorClass: 'is-invalid',
	  errorPlacement: () => false
	 });

	 const wizard = new Enchanter('register-gym', {}, {
	  onNext: () => {
	   if (!registrationForm.valid()) {
	    formValidate.focusInvalid();
	    return false;
	   }
	  }
	 });
	</script>
@endsection
