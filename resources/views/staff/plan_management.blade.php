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
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlanModal">
							Add Plan
						</button>
						@endif @if (!$gym_plans->isEmpty())
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
																	<input type="text" class="form-control" name="PLAN_DESCRIPTION_EDIT" id="PLAN_DESCRIPTION_EDIT" />
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
														<h6 class="text-sm mb-0">{{ $gym_plan->PLAN_ID }}</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Name:
														</p>
														<h6 class="text-sm mb-0">{{ $gym_plan->PLAN_NAME }}</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Description:
														</p>
														<h6 class="text-sm mb-0">{{ $gym_plan->PLAN_DESCRIPTION }}</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Validity:
														</p>
														<h6 class="text-sm mb-0">{{ $gym_plan->PLAN_VALIDITY }} Day/s</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Amount:
														</p>
														<h6 class="text-sm mb-0">₱{{ $gym_plan->PLAN_AMOUNT }}</h6>
													</td>
													<td>
														<p class="text-xs font-weight-bold mb-0">
															Plan Status:
														</p>
														<h6 class="text-sm mb-0">{{ $gym_plan->PLAN_STATUS }}</h6>
													</td>

													<td>

														<button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal"
															data-bs-target="#exampleModal"
															onclick="activateMember('{{ $gym_plan->PLAN_ID }}','{{ $gym_plan->PLAN_NAME }}',' {{ $gym_plan->PLAN_DESCRIPTION }}', '{{ $gym_plan->PLAN_VALIDITY }}','{{ $gym_plan->PLAN_AMOUNT }}')">
															Edit
														</button>
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
							<input type="text" class="form-control" name="PLAN_NAME" id="PLAN_NAME" />
						</div>
						<div class="mb-3">
							<label class="form-label">Plan Description</label>
							<input type="text" class="form-control" name="PLAN_DESCRIPTION" id="PLAN_DESCRIPTION" />
						</div>
						<div class="mb-3">
							<label class="form-label">Plan Validity</label>
							<input type="number" class="form-control" name="PLAN_VALIDITY" id="PLAN_VALIDITY" />
							<div id="validity_help" class="form-text">Enter plan validity in Days.</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Plan Amount</label>
							<input type="number" class="form-control" name="PLAN_AMOUNT" id="PLAN_AMOUNT" />
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
@endsection

@section('bodyscript')
	<script>
	 function activateMember(_PLAN_ID, _PLAN_NAME, _PLAN_DESCRIPTION, _PLAN_VALIDITY, _PLAN_AMOUNT) {
	  var PLAN_ID = _PLAN_ID;
	  var PLAN_NAME_EDIT = _PLAN_NAME;
	  var PLAN_DESCRIPTION_EDIT = _PLAN_DESCRIPTION;
	  var PLAN_VALIDITY_EDIT = _PLAN_VALIDITY;
	  var PLAN_AMOUNT_EDIT = _PLAN_AMOUNT;


	  document.getElementById("PLAN_ID_EDIT").value = PLAN_ID;
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
