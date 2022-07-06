@extends('layouts.staff') @section('title')
	VSGym - Plan Management
@endsection
@section('breadcrumb')
	@if ($staffGym)
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
				<li class="breadcrumb-item text-sm">
					<a class="opacity-5 text-white" href="javascript:;">Pages</a>
				</li>
				<li class="breadcrumb-item text-sm text-white active" aria-current="page">
					Plan Management
				</li>
			</ol>
		</nav>
	@endif
	@endsection @section('sidenav')
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
	@endsection @section('content')
	@if ($staffGym)
		<div class="row">
			<div class="col-lg">
				<div class="card">
					<div class="card-header pb-0 p-3">
						<div class="d-flex justify-content-between">
							<h6 class="mb-2">Plan Management</h6>
						</div>
					</div>
					<div class="card-body">
						@if ($gym_plans->isEmpty())
							<div class="text-center justify-content-center">

								<img class="mt-9" width="30%" src="{{ asset('img/svg/empty.svg') }}" alt="svg1">
								<h2 class="mt-4">Kruu Kruu~</h2>
								<h6 class="mt-4 mb-3">There are no new plans for now. Start by creating one.</h6>
								<div class="mb-7">
									<button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#addPlanModal">
										Add Plan
									</button>
								</div>
							</div>
						@endif
						@if (!$gym_plans->isEmpty())
							<form>
								<div class="row">
									<div class="col-md">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
												<input class="form-control" placeholder="Search" type="text" />
											</div>
										</div>
									</div>
									<div class="col-md d-flex justify-content-end">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlanModal">
											Add Plan
										</button>
									</div>
								</div>
							</form>

							<div class="table-responsive">
								<table class="table align-items-center">
									<tbody>




										@foreach ($gym_plans as $gym_plan)
											<form action="{{ route('staff.edit-plan') }}" name="edit-plan-form" id="edit-plan-form" method="post">

												@csrf
												<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
													aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">Edit Plan</h5>
																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
															</div>
															<div class="modal-body">
																<input type="hidden" name="PLAN_ID_EDIT" id="PLAN_ID_EDIT">
																<div class="mb-3">
																	<label class="form-label">Plan Name</label>
																	<input type="text" class="form-control" name="PLAN_NAME_EDIT" id="PLAN_NAME_EDIT" />
																</div>
																<div class="mb-3">
																	<label class="form-label">Plan Description</label>
																	<input type="text" class="form-control" name="PLAN_DESCRIPTION_EDIT"
																		id="PLAN_DESCRIPTION_EDIT" />
																</div>
																<div class="mb-3">
																	<label class="form-label">Plan Validity</label>
																	<input type="number" class="form-control" name="PLAN_VALIDITY_EDIT" id="PLAN_VALIDITY_EDIT" />
																	<div id="validity_help" class="form-text">Enter plan validity in Days.</div>
																</div>
																<div class="mb-3">
																	<label class="form-label">Plan Amount</label>
																	<input type="number" class="form-control" name="PLAN_AMOUNT_EDIT" id="PLAN_AMOUNT_EDIT" />
																	<div id="amount_help" class="form-text">Enter plan amount in Pesos.</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="button" onclick="submitEditForm()" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>


												<tr>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan ID:
														</p>
														<h6 class="text-sm mb-0">{{ $gym_plan->plan_id }}</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Name:
														</p>
														<h6 class="text-sm mb-0">{{ $gym_plan->plan_name }}</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Description:
														</p>
														<h6 class="text-sm mb-0">{{ $gym_plan->plan_description }}</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Validity:
														</p>
														<h6 class="text-sm mb-0">{{ $gym_plan->plan_validity }} Day/s</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Amount:
														</p>
														<h6 class="text-sm mb-0">₱{{ $gym_plan->plan_amount }}</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Status:
														</p>
														<h6 class="text-sm mb-0">{{ $gym_plan->plan_status }}</h6>
													</td>

													<td>
														<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
															data-bs-target="#exampleModal"
															onclick="activateMember('{{ $gym_plan->plan_id }}','{{ $gym_plan->plan_name }}',' {{ $gym_plan->plan_description }}', '{{ $gym_plan->plan_validity }}','{{ $gym_plan->plan_amount }}')">
															Edit
														</button>
													</td>

													<td>
														<a class="btn btn-danger btn-sm" href="/staff/delete/plan/{{ $gym_plan->plan_id }}">
															Delete
														</a>
													</td>

												</tr>
											</form>
										@endforeach


									</tbody>
								</table>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="addPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							Create Gym Plan
						</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form method="POST" action="{{ route('staff.plan-create') }}">
						@csrf

						<div class="modal-body">
							<div class="mb-3">
								<label class="form-label">Plan Name</label>
								<input type="text" class="form-control" name="plan_name" id="plan_name" />
							</div>
							<div class="mb-3">
								<label class="form-label">Plan Description</label>
								<input type="text" class="form-control" name="plan_description" id="plan_description" />
							</div>
							<div class="mb-3">
								<label class="form-label">Plan Validity</label>
								<input type="number" class="form-control" name="plan_validity" id="plan_validity" />
								<div id="validity_help" class="form-text">Enter plan validity in Days.</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Plan Amount</label>
								<input type="number" class="form-control" name="plan_amount" id="plan_amount" />
								<div id="amount_help" class="form-text">Enter plan amount in Pesos.</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
								Close
							</button>
							<button type="submit" class="btn btn-primary">
								Submit
							</button>
						</div>
					</form>
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
@endsection

@section('bodyscript')
	<script>
	 function activateMember(_PLAN_ID, _PLAN_NAME, _PLAN_DESCRIPTION, _PLAN_VALIDITY, _PLAN_AMOUNT) {
	  var plan_id = _PLAN_ID;
	  var PLAN_NAME_EDIT = _PLAN_NAME;
	  var PLAN_DESCRIPTION_EDIT = _PLAN_DESCRIPTION;
	  var PLAN_VALIDITY_EDIT = _PLAN_VALIDITY;
	  var PLAN_AMOUNT_EDIT = _PLAN_AMOUNT;


	  document.getElementById("PLAN_ID_EDIT").value = plan_id;
	  document.getElementById("PLAN_NAME_EDIT").value = PLAN_NAME_EDIT;
	  document.getElementById("PLAN_DESCRIPTION_EDIT").value = PLAN_DESCRIPTION_EDIT;
	  document.getElementById("PLAN_VALIDITY_EDIT").value = PLAN_VALIDITY_EDIT;
	  document.getElementById("PLAN_AMOUNT_EDIT").value = PLAN_AMOUNT_EDIT;
	 }

	 function submitEditForm() {
	  document.getElementById("edit-plan-form").submit();
	 }
	</script>
@endsection
