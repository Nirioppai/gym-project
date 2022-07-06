<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="{{ asset('css/paymaya.css') }}">
</head>

<body>

	<div class="container">
		@if ($previous_request)
			<div class="row row-cols-1 row-cols-md-3 mb-3 text-center justify-content-center mt-4">

				<div class="col">
					<div class="card mb-4 rounded-3 shadow-sm">
						<div class="card-body">

							<div class="row">
								<div class="col text-start">
									<span class="express">Express Checkout</span>
									<br />
									<span class="express-subtitle">For an easy and fast payment</span>
								</div>
								<div class="col">
									<img class="mt-2 img-fluid" src="{{ asset('img/paymaya.png') }}" alt="paymaya">
								</div>
							</div>

						</div>
					</div>

					<span class="qr-divider mb-4">OR PAY WITH QRPH</span>


					<div class="card mb-4 rounded-3 shadow-sm mt-4">
						<span class="express mt-4">Scan QR Code to pay</span>


						<span class="express-subtitle mt-2">Use your PayMaya App or Banking / <br />Wallet App to scan
							QR</span>

						<div class="card-body">

							<div class="card mb-4 rounded-3 shadow-sm mt-4">

								<div class="card-body">

									<img class="mb-3 ml--3 mr--3" src="{{ asset('img/logos/paymaya_qr.png') }}" alt="paymaya">

								</div>

								<div class="card-header py-3">
									<button onclick="submit_payment()" class="clear-btn"><span class="express">PHP
											{{ $gym_plan->plan_amount }}</span>
										<br />
										<span class="express-subtitle">VS Gym Payments</span></button>
								</div>


							</div>
						</div>
					</div>
				</div>

			</div>
		@endif
	</div>

	<form action="{{ route('store-member-details') }}" name="store-member-form" id="store-member-form" method="post">
		@csrf
		<input type="hidden" name="member_payment" class="form-control" id="member_payment"
			value="{{ $previous_request['member_payment'] }}">
		<input type="hidden" name="plan_id" class="form-control" id="plan_id" value="{{ $previous_request['plan_id'] }}">
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
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
	 integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
	 integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
