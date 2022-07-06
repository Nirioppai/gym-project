@extends('layouts.admin') @section('title')
	Admin - Dashboard
@endsection

@section('breadcrumb')
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
@endsection
@section('sidenav')
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
					<a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Dashboard </span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link {{ Request::is('admin/gyms') ? 'active' : '' }}" href="/admin/gyms">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fa-solid fa-dumbbell text-primary text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Gyms </span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link {{ Request::is('admin/plans') ? 'active' : '' }}" href="/admin/plans">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fa-solid fa-clipboard-list text-primary text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Plans </span>
					</a>
				</li>

				{{-- <li class="nav-item">
					<a class="nav-link {{ Request::is('admin/locations') ? 'active' : '' }}" href="/admin/locations">
						<div
							class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
							<i class="fa-solid fa-location-dot text-primary text-sm opacity-10"></i>
						</div>
						<span class="nav-link-text ms-1">Locations </span>
					</a>
				</li> --}}

			</ul>
		</div>
	</aside>
@endsection
@section('content')
	<div class="card">

		<div class="card-header pb-0 p-3">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="member-list-tab" data-bs-toggle="tab" data-bs-target="#member-list"
						type="button" role="tab" aria-controls="member-list" aria-selected="true">Member List</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="owner-tab" data-bs-toggle="tab" data-bs-target="#owner" type="button" role="tab"
						aria-controls="owner" aria-selected="false">Gym Owner List
					</button>
				</li>

			</ul>

		</div>
		<div class="card-body">


			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="member-list" role="tabpanel" aria-labelledby="member-list-tab">


					@if ($members->isEmpty())
						<div class="text-center justify-content-center">

							<img class="mt-9" width="30%" src="{{ asset('img/svg/empty.svg') }}" alt="svg1">
							<h2 class="mt-4">Kruu Kruu~</h2>
							<h6 class="mt-4 mb-3">There are no gym members at the moment.</h6>

						</div>
					@endif

					@if (!$members->isEmpty())
						<div class="table-responsive">

							<table class="table align-items-start ">
								<tbody>
									@foreach ($members as $member)
										<tr>
											<td class="w-30">
												<div class="d-flex px-2 py-1 align-items-start">

													<div class="ms-4">
														<p class="text-xs font-weight-bold mb-0">Member ID:</p>
														<h6 class="text-sm mb-0">{{ $member->member_id }}</h6>
													</div>
												</div>
											</td>

											<td>
												<div class="text-start">
													<p class="text-xs font-weight-bold mb-0">Member Name:</p>
													<h6 class="text-sm mb-0">{{ $member->name }}</h6>
												</div>
											</td>

											<td>
												<div class="text-end">
													<!-- Button trigger modal -->
													<a class="btn btn-danger btn-sm" href="/admin/delete/member/{{ $member->member_id }}">
														Delete
													</a>
												</div>
											</td>

										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@endif




				</div>
				<div class="tab-pane fade" id="owner" role="tabpanel" aria-labelledby="owner-tab">

					@if ($owners->isEmpty())
						<div class="text-center justify-content-center">

							<img class="mt-9" width="30%" src="{{ asset('img/svg/empty.svg') }}" alt="svg1">
							<h2 class="mt-4">Kruu Kruu~</h2>
							<h6 class="mt-4 mb-3">There are no gym owners at the moment.</h6>

						</div>
					@endif

					@if (!$owners->isEmpty())
						<div class="table-responsive">

							<table class="table align-items-start ">
								<tbody>
									@foreach ($owners as $owner)
										<tr>
											<td class="w-30">
												<div class="d-flex px-2 py-1 align-items-start">

													<div class="ms-4">
														<p class="text-xs font-weight-bold mb-0">Owner ID:</p>
														<h6 class="text-sm mb-0">{{ $owner->member_id }}</h6>
													</div>
												</div>
											</td>

											<td>
												<div class="text-start">
													<p class="text-xs font-weight-bold mb-0">Owner Name:</p>
													<h6 class="text-sm mb-0">{{ $owner->name }}</h6>
												</div>
											</td>

											<td>
												<div class="text-end">
													<!-- Button trigger modal -->
													<a class="btn btn-danger btn-sm" href="/admin/delete/owner/{{ $owner->member_id }}">
														Delete
													</a>
												</div>
											</td>

										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@endif
				</div>

			</div>
		</div>
	</div>
@endsection {{-- <h1>admin Dashboard: {{ auth()->guard('admin')->user()->name }}</h1>
<a href="{{ route('admin.create') }}">Create new admin</a>
<a href="{{ route('admin.logout') }}">Logout</a> --}}

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
