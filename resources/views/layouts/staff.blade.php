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
	@yield('headscript')
	<title>
		@yield('title')
	</title>
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	@yield('custom-font')
	<!-- Nucleo Icons -->
	<link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
	<!-- Font Awesome Icons -->

	<script src="https://kit.fontawesome.com/d3fbd9c521.js" crossorigin="anonymous"></script>

	@yield('styles')
	<link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
	<!-- CSS Files -->
	<link id="pagestyle" href="{{ asset('css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
	<div class="min-height-300 bg-primary position-absolute w-100"></div>

	@yield('sidenav')

	<main class="main-content position-relative border-radius-lg ">
		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
			data-scroll="false">
			<div class="container-fluid py-1 px-3">
				@yield('breadcrumb')
				<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
					<div class="ms-md-auto pe-md-3 d-flex align-items-center">

					</div>
					<ul class="navbar-nav  justify-content-end">

						<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line bg-white"></i>
									<i class="sidenav-toggler-line bg-white"></i>
									<i class="sidenav-toggler-line bg-white"></i>
								</div>
							</a>
						</li>

						<li class="nav-item dropdown px-3 d-flex align-items-center">
							<a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
								aria-expanded="false">

								<i class="fa fa-gear cursor-pointer"></i>

							</a>
							<ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
								<li class="mb-2">
									<a class="dropdown-item border-radius-m text-blackd" href="javascript:;">
										<div class="d-flex py-1">
											<div class="my-auto">
												<i class="fa-solid fa-id-card-clip"></i>
											</div>
											&nbsp;
											&nbsp;
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm text-black font-weight-normal mb-1">
													<span class="font-weight-bold">Your
														profile: </span>{{ auth()->guard('staff')->user()->name }}
												</h6>
											</div>
										</div>
									</a>
								</li>

								<li class="mb-2">
									<a class="dropdown-item border-radius-md text-black" href="{{ route('staff.staff_change_password_ui') }}">
										<div class="d-flex py-1">
											<div class="my-auto">
												<i class="fa-solid fa-unlock"></i>
											</div>
											&nbsp;
											&nbsp;
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">
													<span class="font-weight-bold">Change Password</span>
												</h6>
											</div>
										</div>
									</a>
								</li>
								<li class="mb-2">
									<a class="dropdown-item border-radius-md text-black" href="{{ route('staff.logout') }}">
										<div class="d-flex py-1">
											<div class="my-auto">
												<i class="fa-solid fa-arrow-right-from-bracket"></i>
											</div>
											&nbsp;
											&nbsp;
											<div class="d-flex flex-column justify-content-center">
												<h6 class="text-sm font-weight-normal mb-1">
													<span class="font-weight-bold">Logout</span>
												</h6>
											</div>
										</div>
									</a>
								</li>

							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->
		<div class="container-fluid py-4">


			@yield('content')


			<footer class="footer pt-3  ">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-lg-6 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start">
								©
								<script>
								 document.write(new Date().getFullYear())
								</script>
								<a href="#" class="font-weight-bold">VSGym</a>

							</div>
						</div>
					</div>
				</div>
			</footer>
			@yield('toast')
		</div>
	</main>

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
	@yield('bodyscript')
</body>

</html>
