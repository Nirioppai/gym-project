@extends('layouts.staff')

@section('title')
	VSGym - Members
@endsection

@section('breadcrumb')
	@if ($staffGym)
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
				<li class="breadcrumb-item text-sm">
					<a class="opacity-5 text-white" href="javascript:;">Pages</a>
				</li>
				<li class="breadcrumb-item text-sm text-white active" aria-current="page">
					Members
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
	<div class="row">
		<div class="col-lg">
			<div class="card ">
				<div class="card-header pb-0 p-3">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="member-list-tab" data-bs-toggle="tab" data-bs-target="#member-list"
								type="button" role="tab" aria-controls="member-list" aria-selected="true">Member List</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="approval-tab" data-bs-toggle="tab" data-bs-target="#approval" type="button"
								role="tab" aria-controls="approval" aria-selected="false">Member
								Approvals</button>
						</li>

					</ul>

				</div>
				<div class="card-body">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="member-list" role="tabpanel" aria-labelledby="member-list-tab">

							@if ($activeMembers->isEmpty())
								<div class="text-center justify-content-center">

									<img class="mt-9" width="30%" src="{{ asset('img/svg/empty.svg') }}" alt="svg1">
									<h2 class="mt-4">Kruu Kruu~</h2>

									<h6 class="mt-4 mb-3">There are no members for now. You can create one, or approve some on the next tab.
									</h6>
									<div class="mb-7">
										<button type="button" class="btn btn-primary btn-sm">Add Member</button>
									</div>

								</div>
							@endif

							@if (!$activeMembers->isEmpty())
								<form>
									<div class="row">
										<div class="col-md">
											<div class="form-group">
												<div class="input-group ">
													<span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
													<input class="form-control" placeholder="Search" type="text">
												</div>
											</div>
										</div>
										<div class="col-md d-flex justify-content-end">
											<button type="button" class="btn btn-primary btn-sm">Add Member</button>
										</div>
									</div>
								</form>
								<div class="table-responsive">

									<table class="table align-items-start ">
										<tbody>
											@foreach ($activeMembers as $activeMember)
												<tr>
													<td class="w-30">
														<div class="d-flex px-2 py-1 align-items-start">

															<div class="ms-4">
																<p class="text-xs font-weight-bold mb-0">Name:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->name }}</h6>
															</div>
														</div>
													</td>
													<td>
														<div class="text-start">
															<p class="text-xs font-weight-bold mb-0">Member ID:</p>
															<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_ID }}</h6>
														</div>
													</td>
													<td>
														<div class="text-start">
															<p class="text-xs font-weight-bold mb-0">Plan Name:</p>
															<h6 class="text-sm mb-0">{{ $activeMember->PLAN_NAME }}</h6>
														</div>
													</td>
													<td>
														<div class="text-start">
															<p class="text-xs font-weight-bold mb-0">Registration Date:</p>
															<h6 class="text-sm mb-0">{{ $activeMember->created_at }}</h6>
														</div>
													</td>
													<td>
														<div class="text-start">
															<p class="text-xs font-weight-bold mb-0">Registration Expiry:</p>
															<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_EXPIRY_DATE }}</h6>
														</div>
													</td>
													<td>
														<div class="text-start">
															<p class="text-xs font-weight-bold mb-0">Payment Method:</p>
															<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_PAYMENT }}</h6>
														</div>
													</td>
													<td>
														<div class="text-start">
															<p class="text-xs font-weight-bold mb-0">Gender:</p>
															<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_GENDER }}</h6>
														</div>
													</td>
													<td>
														<div class="text-start">
															<p class="text-xs font-weight-bold mb-0">Contact Number:</p>
															<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_PHONE_NUMBER }}</h6>
														</div>
													</td>
													<td>
														<div class="text-start">
															<p class="text-xs font-weight-bold mb-0">Date of Birth:</p>
															<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_DATE_OF_BIRTH }}</h6>
														</div>
													</td>
													<td>
														<div class="text-start">
															<p class="text-xs font-weight-bold mb-0">Membership Status:</p>
															<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_STATUS }}</h6>
														</div>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							@endif


						</div>
						<div class="tab-pane fade" id="approval" role="tabpanel" aria-labelledby="approval-tab">

							@if ($pendingMembers->isEmpty())
								<div class="text-center justify-content-center">

									<img class="mt-9" width="30%" src="{{ asset('img/svg/empty.svg') }}" alt="svg1">
									<h2 class="mt-4">Kruu Kruu~</h2>
									<h6 class="mt-4 mb-9">There are no new members for now.</h6>
								</div>
							@endif

							@if (!$pendingMembers->isEmpty())
								<div class="table-responsive">
									<form action="{{ route('staff.activate-member') }}" name="activate-member-form" id="activate-member-form"
										method="post">
										@csrf
										<input type="hidden" name="member_payment_id" class="form-control" id="member_payment_id" value="">
										<table class="table align-items-start ">
											<tbody>
												@foreach ($pendingMembers as $pendingMember)
													<tr>
														<td class="w-30">
															<div class="d-flex px-2 py-1 align-items-start">

																<div class="ms-4">
																	<p class="text-xs font-weight-bold mb-0">Name:</p>
																	<h6 class="text-sm mb-0">{{ $activeMember->name }}</h6>
																</div>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Member ID:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_ID }}</h6>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Plan Name:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->PLAN_NAME }}</h6>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Registration Date:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->created_at }}</h6>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Registration Expiry:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_EXPIRY_DATE }}</h6>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Payment Method:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_PAYMENT }}</h6>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Gender:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_GENDER }}</h6>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Contact Number:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_PHONE_NUMBER }}</h6>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Date of Birth:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_DATE_OF_BIRTH }}</h6>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Membership Status:</p>
																<h6 class="text-sm mb-0">{{ $activeMember->MEMBER_STATUS }}</h6>
															</div>
														</td>



														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Activate Member</p>
																<div class="form-check form-switch">
																	<input class="form-check-input" type="checkbox"
																		onclick="activateMember('{{ $pendingMember->PAYMENT_ID }}')">
																</div>





															</div>
														</td>

													</tr>
												@endforeach
											</tbody>
										</table>
									</form>
								</div>
							@endif


						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
@endsection

@section('bodyscript')
	<script>
	 function activateMember(id) {
	  console.log(id);
	  var payment = id;
	  document.getElementById("member_payment_id").value = payment;
	  document.getElementById("activate-member-form").submit();
	 }
	</script>
@endsection
