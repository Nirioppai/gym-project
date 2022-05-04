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
		<div class="row">
			<div class="col-xl col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-uppercase font-weight-bold">
										Total Members
									</p>
									<h5 class="font-weight-bolder">$53,000</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
									<i class="fa-solid fa-people-group text-lg opacity-10"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-sm mb-0 text-uppercase font-weight-bold">
										Pending Members
									</p>
									<h5 class="font-weight-bolder">2,300</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
									<i class="fa-solid fa-person-circle-check text-lg opacity-10"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-lg-7 mb-lg-0 mb-4">
				<div class="card">
					<div class="card-header pb-0 p-3">
						<div class="d-flex justify-content-between">
							<h6 class="mb-2">Sales by Country</h6>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table align-items-center">
							<tbody>
								<tr>
									<td class="w-30">
										<div class="d-flex px-2 py-1 align-items-center">
											<div>
												<img src="{{ asset('img/icons/flags/US.png') }}" alt="Country flag" />
											</div>
											<div class="ms-4">
												<p class="text-xs font-weight-bold mb-0">
													Country:
												</p>
												<h6 class="text-sm mb-0">
													United States
												</h6>
											</div>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="text-xs font-weight-bold mb-0">
												Sales:
											</p>
											<h6 class="text-sm mb-0">2500</h6>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="text-xs font-weight-bold mb-0">
												Value:
											</p>
											<h6 class="text-sm mb-0">$230,900</h6>
										</div>
									</td>
									<td class="align-middle text-sm">
										<div class="col text-center">
											<p class="text-xs font-weight-bold mb-0">
												Bounce:
											</p>
											<h6 class="text-sm mb-0">29.9%</h6>
										</div>
									</td>
								</tr>
								<tr>
									<td class="w-30">
										<div class="d-flex px-2 py-1 align-items-center">
											<div>
												<img src="{{ asset('img/icons/flags/DE.png') }}" alt="Country flag" />
											</div>
											<div class="ms-4">
												<p class="text-xs font-weight-bold mb-0">
													Country:
												</p>
												<h6 class="text-sm mb-0">Germany</h6>
											</div>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="text-xs font-weight-bold mb-0">
												Sales:
											</p>
											<h6 class="text-sm mb-0">3.900</h6>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="text-xs font-weight-bold mb-0">
												Value:
											</p>
											<h6 class="text-sm mb-0">$440,000</h6>
										</div>
									</td>
									<td class="align-middle text-sm">
										<div class="col text-center">
											<p class="text-xs font-weight-bold mb-0">
												Bounce:
											</p>
											<h6 class="text-sm mb-0">40.22%</h6>
										</div>
									</td>
								</tr>
								<tr>
									<td class="w-30">
										<div class="d-flex px-2 py-1 align-items-center">
											<div>
												<img src="{{ asset('img/icons/flags/GB.png') }}" alt="Country flag" />
											</div>
											<div class="ms-4">
												<p class="text-xs font-weight-bold mb-0">
													Country:
												</p>
												<h6 class="text-sm mb-0">
													Great Britain
												</h6>
											</div>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="text-xs font-weight-bold mb-0">
												Sales:
											</p>
											<h6 class="text-sm mb-0">1.400</h6>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="text-xs font-weight-bold mb-0">
												Value:
											</p>
											<h6 class="text-sm mb-0">$190,700</h6>
										</div>
									</td>
									<td class="align-middle text-sm">
										<div class="col text-center">
											<p class="text-xs font-weight-bold mb-0">
												Bounce:
											</p>
											<h6 class="text-sm mb-0">23.44%</h6>
										</div>
									</td>
								</tr>
								<tr>
									<td class="w-30">
										<div class="d-flex px-2 py-1 align-items-center">
											<div>
												<img src="{{ asset('img/icons/flags/BR.png') }}" alt="Country flag" />
											</div>
											<div class="ms-4">
												<p class="text-xs font-weight-bold mb-0">
													Country:
												</p>
												<h6 class="text-sm mb-0">Brasil</h6>
											</div>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="text-xs font-weight-bold mb-0">
												Sales:
											</p>
											<h6 class="text-sm mb-0">562</h6>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="text-xs font-weight-bold mb-0">
												Value:
											</p>
											<h6 class="text-sm mb-0">$143,960</h6>
										</div>
									</td>
									<td class="align-middle text-sm">
										<div class="col text-center">
											<p class="text-xs font-weight-bold mb-0">
												Bounce:
											</p>
											<h6 class="text-sm mb-0">32.14%</h6>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="card">
					<div class="card-header pb-0 p-3">
						<h6 class="mb-0">Categories</h6>
					</div>
					<div class="card-body p-3">
						<ul class="list-group">
							<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
								<div class="d-flex align-items-center">
									<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
										<i class="ni ni-mobile-button text-white opacity-10"></i>
									</div>
									<div class="d-flex flex-column">
										<h6 class="mb-1 text-dark text-sm">Devices</h6>
										<span class="text-xs">250 in stock,
											<span class="font-weight-bold">346+ sold</span></span>
									</div>
								</div>
								<div class="d-flex">
									<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
										<i class="ni ni-bold-right" aria-hidden="true"></i>
									</button>
								</div>
							</li>
							<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
								<div class="d-flex align-items-center">
									<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
										<i class="ni ni-tag text-white opacity-10"></i>
									</div>
									<div class="d-flex flex-column">
										<h6 class="mb-1 text-dark text-sm">Tickets</h6>
										<span class="text-xs">123 closed,
											<span class="font-weight-bold">15 open</span></span>
									</div>
								</div>
								<div class="d-flex">
									<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
										<i class="ni ni-bold-right" aria-hidden="true"></i>
									</button>
								</div>
							</li>
							<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
								<div class="d-flex align-items-center">
									<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
										<i class="ni ni-box-2 text-white opacity-10"></i>
									</div>
									<div class="d-flex flex-column">
										<h6 class="mb-1 text-dark text-sm">
											Error logs
										</h6>
										<span class="text-xs">1 is active,
											<span class="font-weight-bold">40 closed</span></span>
									</div>
								</div>
								<div class="d-flex">
									<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
										<i class="ni ni-bold-right" aria-hidden="true"></i>
									</button>
								</div>
							</li>
							<li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
								<div class="d-flex align-items-center">
									<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
										<i class="ni ni-satisfied text-white opacity-10"></i>
									</div>
									<div class="d-flex flex-column">
										<h6 class="mb-1 text-dark text-sm">
											Happy users
										</h6>
										<span class="text-xs font-weight-bold">+ 430</span>
									</div>
								</div>
								<div class="d-flex">
									<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
										<i class="ni ni-bold-right" aria-hidden="true"></i>
									</button>
								</div>
							</li>
						</ul>
					</div>
				</div>
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

									<form method="POST" action="{{ route('staff.gym-create') }}" enctype="multipart/form-data" action="">
										@csrf
										<div class="mb-3">
											<label class="form-label">Gym Name</label>
											<input type="text" class="form-control" name="GYM_NAME" id="GYM_NAME" />
										</div>
										<div class="mb-3">
											<label class="form-label">Gym Location</label>
											<textarea class="form-control" name="GYM_LOCATION" id="GYM_LOCATION" rows="3"></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">Gym Details</label>
											<textarea class="form-control" name="GYM_DETAILS" id="GYM_DETAILS" rows="3"></textarea>
										</div>

										<div class="mb-3">
											<label class="form-label">Gym Image</label>
											<input class="form-control" type="file" name="GYM_IMAGE" id="GYM_IMAGE" />
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
