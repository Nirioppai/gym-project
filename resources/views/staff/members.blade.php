@extends('layouts.staff')

@section('title')
	VSGym - Members
@endsection

@section('styles')
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
	@if ($staffGym)
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

								<!-- Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
									aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<form action="{{ route('staff.create-member') }}" name="create-member-form" id="create-member-form"
												method="post">
												@csrf
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Add Member</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">

													<div class="mb-3">
														<label for="name">Name</label>
														<input type="text" class="form-control" name="name" id="name">


													</div>

													<div class="mb-3">
														<label for="email">Email</label>
														<input type="email" class="form-control" name="email" id="email">


													</div>
													<div class="mb-3">
														<label for="MEMBER_ADDRESS">Address</label>
														<textarea name="MEMBER_ADDRESS" rows="5" class="form-control" id="MEMBER_ADDRESS"></textarea>
													</div>
													<div class="mb-3">
														<label for="MEMBER_GENDER">Gender</label>
														<select class="form-select" name="MEMBER_GENDER" id="MEMBER_GENDER" aria-label="Default select example">
															<option disabled selected>Gender</option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
														{{-- <input type="text" name="MEMBER_GENDER" class="form-control" id="MEMBER_GENDER" > --}}
													</div>
													<div class="mb-3">
														<label for="MEMBER_DATE_OF_BIRTH">Date of Birth</label>

														<div class="input-group date">
															<input type="text" class="form-control" name="MEMBER_DATE_OF_BIRTH" id="datepicker">
															<span class="input-group-append">
																<span class="input-group-text bg-white d-block">
																	<i class="fa fa-calendar"></i>
																</span>
															</span>
														</div>


														{{-- <input type="text" name="MEMBER_DATE_OF_BIRTH" class="form-control" id="MEMBER_DATE_OF_BIRTH" > --}}
													</div>
													<div class="mb-3">
														<label for="MEMBER_PHONE_NUMBER">Phone Number</label>
														<input type="text" name="MEMBER_PHONE_NUMBER" class="form-control" id="MEMBER_PHONE_NUMBER">
													</div>
													<div class="mb-3">
														<label for="PLAN_ID">Gym Plan</label>
														<select class="form-select" name="PLAN_ID" id="PLAN_ID" aria-label="Default select example">
															<option disabled selected>Select Gym Plan</option>

															@foreach ($gym_plans as $gym_plan)
																<option value="{{ $gym_plan->PLAN_ID }}">{{ $gym_plan->PLAN_NAME }}</option>
															@endforeach


														</select>

													</div>


												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Save changes</button>
												</div>
											</form>
										</div>
									</div>
								</div>






								@if ($activeMembers->isEmpty())
									<div class="text-center justify-content-center">

										<img class="mt-9" width="30%" src="{{ asset('img/svg/empty.svg') }}" alt="svg1">
										<h2 class="mt-4">Kruu Kruu~</h2>

										<h6 class="mt-4 mb-3">There are no members for now. You can create one, or approve some on the next tab.
										</h6>
										<div class="mb-7">
											<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
												Add Member
											</button>
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
												<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
													Add Member
												</button>


											</div>
										</div>
									</form>
									<div class="table-responsive">

										<table class="table align-items-start ">
											<tbody>
												@foreach ($activeMembers as $activeMember)
													<!-- Modal -->
													<form action="{{ route('staff.edit-member') }}" method="post">
														@csrf
														<div class="modal fade" id="editModal{{ $activeMember->MEMBER_ID }}" tabindex="-1"
															aria-labelledby="editModalLabel" aria-hidden="true">
															<div class="modal-dialog modal-fullscreen">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="editModalLabel">Edit {{ $activeMember->name }}'s Details</h5>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">


																		<ul class="nav nav-tabs" id="myTab" role="tablist">
																			<li class="nav-item" role="presentation">
																				<button class="nav-link active" id="details-tab" data-bs-toggle="tab"
																					data-bs-target="#details{{ $activeMember->MEMBER_ID }}" type="button" role="tab"
																					aria-controls="details" aria-selected="true">Member Details</button>
																			</li>
																			<li class="nav-item" role="presentation">
																				<button class="nav-link" id="health-tab" data-bs-toggle="tab"
																					data-bs-target="#health{{ $activeMember->MEMBER_ID }}" type="button" role="tab"
																					aria-controls="health" aria-selected="false">Member Health</button>
																			</li>

																		</ul>

																		<input type="hidden" name="MEMBER_ID" value="{{ $activeMember->MEMBER_ID }}">
																		<div class="tab-content" id="myTabContent">
																			<div class="tab-pane fade show active" id="details{{ $activeMember->MEMBER_ID }}" role="tabpanel"
																				aria-labelledby="details-tab">
																				<div class="mb-3">
																					<label for="MEMBER_ADDRESS">Address</label>
																					<textarea name="MEMBER_ADDRESS" rows="5" class="form-control"
                      id="MEMBER_ADDRESS">{{ $activeMember->MEMBER_ADDRESS }}</textarea>
																				</div>
																				<div class="mb-3">
																					<label for="MEMBER_GENDER">Gender</label>
																					<select class="form-select" name="MEMBER_GENDER" id="MEMBER_GENDER"
																						aria-label="Default select example">
																						<option value="{{ $activeMember->MEMBER_GENDER }}" selected>
																							{{ $activeMember->MEMBER_GENDER }}</option>
																						<option value="Male">Male</option>
																						<option value="Female">Female</option>
																					</select>
																					{{-- <input type="text" name="MEMBER_GENDER" class="form-control" id="MEMBER_GENDER" > --}}
																				</div>
																				<div class="mb-3">
																					<label for="MEMBER_DATE_OF_BIRTH">Date of Birth</label>

																					<div class="input-group date">
																						<input type="text" class="form-control" value="{{ $activeMember->MEMBER_DATE_OF_BIRTH }}"
																							name="MEMBER_DATE_OF_BIRTH" id="datepicker">
																						<span class="input-group-append">
																							<span class="input-group-text bg-white d-block">
																								<i class="fa fa-calendar"></i>
																							</span>
																						</span>
																					</div>
																				</div>
																				<div class="mb-3">
																					<label for="MEMBER_PHONE_NUMBER">Phone Number</label>
																					<input type="text" value="{{ $activeMember->MEMBER_PHONE_NUMBER }}" name="MEMBER_PHONE_NUMBER"
																						class="form-control" id="MEMBER_PHONE_NUMBER">
																				</div>
																			</div>
																			<div class="tab-pane fade" id="health{{ $activeMember->MEMBER_ID }}" role="tabpanel"
																				aria-labelledby="health-tab">
																				<div class="mb-3 mt-3">
																					<label for="HEALTH_HEIGHT">Member Height</label>
																					<input type="text" class="form-control" value="{{ $activeMember->HEALTH_HEIGHT }}"
																						name="HEALTH_HEIGHT" id="HEALTH_HEIGHT">
																				</div>
																				<div class="mb-3">
																					<label for="HEALTH_WEIGHT">Member Weight</label>
																					<input type="text" class="form-control" value="{{ $activeMember->HEALTH_WEIGHT }}"
																						name="HEALTH_WEIGHT" id="HEALTH_WEIGHT">
																				</div>
																				<div class="mb-3">
																					<label for="HEALTH_WAIST">Member Waistline</label>
																					<input type="text" class="form-control" value="{{ $activeMember->HEALTH_WAIST }}"
																						name="HEALTH_WAIST" id="HEALTH_WAIST">
																				</div>
																				<div class="mb-3">
																					<label for="HEALTH_REMARKS">Member Remarks</label>
																					<textarea class="form-control" name="HEALTH_REMARKS" id="HEALTH_REMARKS"
                      rows="3">{{ $activeMember->HEALTH_REMARKS }}</textarea>
																				</div>
																			</div>

																		</div>



																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																		<button type="submit" class="btn btn-primary">Save changes</button>
																	</div>
																</div>
															</div>
														</div>
													</form>
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
																<h6 class="text-sm mb-0">{{ \Carbon\Carbon::parse($activeMember->created_at)->format('jS F y') }}

																</h6>
															</div>
														</td>
														<td>
															<div class="text-start">
																<p class="text-xs font-weight-bold mb-0">Registration Expiry:</p>
																<h6 class="text-sm mb-0">
																	{{ \Carbon\Carbon::parse($activeMember->MEMBER_EXPIRY_DATE)->format('jS F y') }}
																</h6>
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
																<!-- Button trigger modal -->
																<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
																	data-bs-target="#editModal{{ $activeMember->MEMBER_ID }}">
																	Edit
																</button>
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
																		<h6 class="text-sm mb-0">{{ $pendingMember->name }}</h6>
																	</div>
																</div>
															</td>
															<td>
																<div class="text-start">
																	<p class="text-xs font-weight-bold mb-0">Member ID:</p>
																	<h6 class="text-sm mb-0">{{ $pendingMember->MEMBER_ID }}</h6>
																</div>
															</td>
															<td>
																<div class="text-start">
																	<p class="text-xs font-weight-bold mb-0">Plan Name:</p>
																	<h6 class="text-sm mb-0">{{ $pendingMember->PLAN_NAME }}</h6>
																</div>
															</td>
															<td>
																<div class="text-start">
																	<p class="text-xs font-weight-bold mb-0">Registration Date:</p>
																	<h6 class="text-sm mb-0">{{ \Carbon\Carbon::parse($pendingMember->created_at)->format('jS F y') }}

																	</h6>
																</div>
															</td>
															<td>
																<div class="text-start">
																	<p class="text-xs font-weight-bold mb-0">Registration Expiry:</p>
																	<h6 class="text-sm mb-0">
																		{{ \Carbon\Carbon::parse($pendingMember->MEMBER_EXPIRY_DATE)->format('jS F y') }}

																	</h6>
																</div>
															</td>
															<td>
																<div class="text-start">
																	<p class="text-xs font-weight-bold mb-0">Payment Method:</p>
																	<h6 class="text-sm mb-0">{{ $pendingMember->MEMBER_PAYMENT }}</h6>
																</div>
															</td>
															<td>
																<div class="text-start">
																	<p class="text-xs font-weight-bold mb-0">Gender:</p>
																	<h6 class="text-sm mb-0">{{ $pendingMember->MEMBER_GENDER }}</h6>
																</div>
															</td>
															<td>
																<div class="text-start">
																	<p class="text-xs font-weight-bold mb-0">Contact Number:</p>
																	<h6 class="text-sm mb-0">{{ $pendingMember->MEMBER_PHONE_NUMBER }}</h6>
																</div>
															</td>
															<td>
																<div class="text-start">
																	<p class="text-xs font-weight-bold mb-0">Date of Birth:</p>
																	<h6 class="text-sm mb-0">{{ $pendingMember->MEMBER_DATE_OF_BIRTH }}</h6>
																</div>
															</td>
															<td>
																<div class="text-start">
																	<p class="text-xs font-weight-bold mb-0">Membership Status:</p>
																	<h6 class="text-sm mb-0">{{ $pendingMember->MEMBER_STATUS }}</h6>
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
@endsection

@section('bodyscript')
	<!-- jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	 integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
	 crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script>
	 $(document).ready(function() {
	  $('#datepicker').datepicker();
	  $('#sidebarCollapse').on('click', function() {
	   $('#sidebar').toggleClass('active');
	  });
	 });
	</script>

	<script>
	 function activateMember(id) {
	  console.log(id);
	  var payment = id;
	  document.getElementById("member_payment_id").value = payment;
	  document.getElementById("activate-member-form").submit();
	 }
	</script>
@endsection
