@extends('layouts.staff') @section('title')
	VSGym - Dashboard
@endsection

@section('breadcrumb')
	@if ($staffGym)
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
				<li class="breadcrumb-item text-sm">
					<a class="opacity-5 text-white" href="javascript:;">Pages</a>
				</li>
				<li class="breadcrumb-item text-sm text-white active" aria-current="page">
					Dashboard
				</li>
			</ol>
		</nav>
	@endif
@endsection
@section('sidenav')
	@if ($staffGym)
		<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
			id="sidenav-main">
			<div class="sidenav-header">
				<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
					aria-hidden="true" id="iconSidenav"></i>
				<a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
					target="_blank">
					<img src="{{ asset('img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo" />

					<span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
				</a>
			</div>
			<hr class="horizontal dark mt-0" />

			<div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
				<ul class="navbar-nav">
					<li class="nav-item mt-3">
						<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
							Monitoring
						</h6>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Request::is('staff/dashboard') ? 'active' : '' }}" href="/staff/dashboard">
							<div
								class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Dashboard </span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Request::is('staff/members') ? 'active' : '' }}" href="/staff/members">
							<div
								class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Members </span>
						</a>
					</li>

					<li class="nav-item mt-3">
						<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
							Management
						</h6>
					</li>

					<li class="nav-item">
						<a class="nav-link {{ Request::is('staff/gym-management') ? 'active' : '' }}" href="/staff/gym-management">
							<div
								class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="ni ni-credit-card text-success text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Gym Management</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Request::is('staff/plan-management') ? 'active' : '' }}" href="/staff/plan-management">
							<div
								class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
								<i class="ni ni-app text-info text-sm opacity-10"></i>
							</div>
							<span class="nav-link-text ms-1">Plan Management</span>
						</a>
					</li>
				</ul>
			</div>
		</aside>
	@endif
@endsection
@section('content')
	@if ($staffGym)
		<div class="card">
			<div class="card-body">
				<form action="{{ route('staff.staff_change_password') }}" name="password-change-form" id="password-change-form"
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
						<input class="form-control  @error('new_password_confirmation') is-invalid @enderror"
							id="new_password_confirmation" type="password" name="new_password_confirmation" required="required" />

						@error('new_password_confirmation')
							<span class="text-danger">{{ $message }}</span>
						@enderror
					</div>

					<button class="btn btn-orange text-end" type="submit">Submit</button>
				</form>
			</div>
		</div>
	@endif
	@if (!$staffGym)
		<div class="row">
			<div class="col-xl col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col">
								<div class="numbers">
									<h5 class="font-weight-bolder mb-4">
										You don't have a Gym yet. Create one now.
									</h5>

									<form method="POST" action="{{ route('staff.gym-create') }}" enctype="multipart/form-data"
										action="">
										@csrf
										<div class="mb-3">
											<label class="form-label">Gym Name</label>
											<input type="text" class="form-control" name="gym_name" id="gym_name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Gym Location</label>
											<textarea class="form-control" name="gym_location" id="gym_location" rows="3"></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Gym Details</label>
											<textarea class="form-control" name="gym_details" id="gym_details" rows="3"></textarea>
										</div>

										<div class="mb-3">
											<label class="form-label">Gym Image</label>
											<input class="form-control" type="file" name="gym_image" id="gym_image" />
										</div>

										<div class="text-end">
											<button type="submit" class="btn btn-primary">
												Submit
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif
@endsection {{-- <h1>Staff Dashboard: {{ auth()->guard('staff')->user()->name }}</h1>
<a href="{{ route('staff.create') }}">Create new Staff</a>
<a href="{{ route('staff.logout') }}">Logout</a> --}}

@section('bodyscript')
	<script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
	<!-- Chartisan -->
	<script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>

	<script>
	 const chart = new Chartisan({
	  el: '#dashboard-chart',
	  url: "@chart('dashboard_chart')",
	  hooks: new ChartisanHooks()
	   .colors()
	 });

	 const IncomeChart = new Chartisan({
	  el: '#income-chart',
	  url: "@chart('income_chart')",
	  hooks: new ChartisanHooks()
	   .colors()
	 });
	</script>
@endsection
