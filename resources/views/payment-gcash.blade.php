<!--
=========================================================
* Argon Dashboard 2 - v2.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
	<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

	<title>
		VS Gym - Gcash
	</title>
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />


	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
	<!-- CSS Files -->
	<link id="pagestyle" href="{{ asset('css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('css/gcash.css') }}">
</head>

<body class="g-sidenav-show   bg-gray-100">
	<div class="min-height-270 bg-gcash position-absolute w-100"></div>


	@if ($previous_request)
		<main class="main-content position-relative border-radius-lg ">
			<div class="container-fluid py-4">


				<div class="d-flex justify-content-center"><img width="240px" src="{{ asset('img/gcash-merchant.png') }}"
						alt="gcash"></div>


				<div class="d-flex justify-content-center mt-5">
					<div class="card text-center">

						<div class="card-body">
							<h2 class="title-h2">VS Gym Vouchers</h2>


							<h6 class="text-start">PAY WITH</h6>
							<div class="row">
								<div class="col text-start">
									<h6 class="tab-gray">&nbsp;&nbsp;&nbsp;Gcash</h6>
								</div>
								<div class="col text-end">
									<h6>PHP {{ $gym_plan->plan_amount }}</h6>
								</div>
							</div>

							<h6 class="text-start mt-5">YOU ARE ABOUT TO PAY</h6>
							<div class="mt-3">
								<div class="row">
									<div class="col text-start">
										<h6 class="tab-gray">&nbsp;&nbsp;&nbsp;Amount</h6>
									</div>
									<div class="col text-end">
										<h6>PHP {{ $gym_plan->plan_amount }}</h6>
									</div>
								</div>

								<div class="row">
									<div class="col text-start">
										<h6 class="tab-gray">&nbsp;&nbsp;&nbsp;Discount</h6>
									</div>
									<div class="col text-end">
										<h6 class="tab-gray">No available voucher</h6>
									</div>
								</div>



							</div>

							<hr>
							<div class="row">
								<div class="col text-start">
									<h6>&nbsp;&nbsp;&nbsp;Total</h6>
								</div>
								<div class="col text-end">
									<span class="mini-php">PHP</span> <span class="large-30">{{ $gym_plan->plan_amount }}</span>
								</div>
							</div>

							<div class="mt-5">
								<p class="card-text">Please review to ensure that the details are correct before you<br /> proceed.</p>

							</div>

							<br />
							<button onclick="submit_payment()" type="button"
								class="btn btn-primary btn-lg btn-block rounded-pill btn-gcash">PAY PHP {{ $gym_plan->plan_amount }}</button>
						</div>
					</div>
				</div>


			</div>
		</main>
	@endif

	<form action="{{ route('store-member-details') }}" name="store-member-form" id="store-member-form" method="post">
		@csrf
		<input type="hidden" name="member_payment" class="form-control" id="member_payment"
			value="{{ $previous_request['member_payment'] }}">
		<input type="hidden" name="plan_id" class="form-control" id="plan_id"
			value="{{ $previous_request['plan_id'] }}">
		<input type="hidden" name="member_address" class="form-control" value="{{ $previous_request['member_address'] }}">
		<input type="hidden" name="member_gender" class="form-control" id="member_gender"
			value="{{ $previous_request['member_gender'] }}">
		<input type="hidden" name="member_date_of_birth" class="form-control" id="member_date_of_birth"
			value="{{ $previous_request['member_date_of_birth'] }}">
		<input type="hidden" name="member_phone_number" class="form-control" id="member_phone_number"
			value="{{ $previous_request['member_phone_number'] }}">
		<input type="hidden" name="gym_id" class="form-control" id="gym_id" value="{{ $previous_request['gym_id'] }}">
		<input type="hidden" name="plan_amount" class="form-control" id="plan_amount"
			value="{{ $previous_request['plan_amount'] }}">

		<input type="hidden" name="plan_validity" id="plan_validity" value="{{ $gym_plan->plan_validity }}">
		<input type="hidden" name="plan_id" id="plan_id" value="{{ $gym_plan->plan_id }}">
	</form>



	<script>
	 function submit_payment() {
	  document.getElementById('store-member-form').submit();
	 }
	</script>

	<!--   Core JS Files   -->
	<script src="{{ asset('js/core/popper.min.js') }}"></script>
	<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
	<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
	<script>
	 var ctx1 = document.getElementById("chart-line").getContext("2d");

	 var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

	 gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
	 gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
	 gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
	 new Chart(ctx1, {
	  type: "line",
	  data: {
	   labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	   datasets: [{
	    label: "Mobile apps",
	    tension: 0.4,
	    borderWidth: 0,
	    pointRadius: 0,
	    borderColor: "#5e72e4",
	    backgroundColor: gradientStroke1,
	    borderWidth: 3,
	    fill: true,
	    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
	    maxBarThickness: 6

	   }],
	  },
	  options: {
	   responsive: true,
	   maintainAspectRatio: false,
	   plugins: {
	    legend: {
	     display: false,
	    }
	   },
	   interaction: {
	    intersect: false,
	    mode: 'index',
	   },
	   scales: {
	    y: {
	     grid: {
	      drawBorder: false,
	      display: true,
	      drawOnChartArea: true,
	      drawTicks: false,
	      borderDash: [5, 5]
	     },
	     ticks: {
	      display: true,
	      padding: 10,
	      color: '#fbfbfb',
	      font: {
	       size: 11,
	       family: "Open Sans",
	       style: 'normal',
	       lineHeight: 2
	      },
	     }
	    },
	    x: {
	     grid: {
	      drawBorder: false,
	      display: false,
	      drawOnChartArea: false,
	      drawTicks: false,
	      borderDash: [5, 5]
	     },
	     ticks: {
	      display: true,
	      color: '#ccc',
	      padding: 20,
	      font: {
	       size: 11,
	       family: "Open Sans",
	       style: 'normal',
	       lineHeight: 2
	      },
	     }
	    },
	   },
	  },
	 });
	</script>
	<script>
	 var win = navigator.platform.indexOf('Win') > -1;
	 if (win && document.querySelector('#sidenav-scrollbar')) {
	  var options = {
	   damping: '0.5'
	  }
	  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
	 }
	</script>
	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="{{ asset('js/argon-dashboard.min.js') }}"></script>

</body>

</html>
