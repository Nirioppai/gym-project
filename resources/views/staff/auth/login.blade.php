<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Poppins:wght@400&display=swap"
		rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

	<title>VS Gym - Login</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="/">VS Gym</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</nav>

	<main>
		<div class="container">
			<div class="d-flex align-items-center justify-content-center load-height">
				<div class="row">
					<div class="col">
						<img src="{{ asset('img/svg/auth.svg') }}" class="img-fluid" alt="svg1">
					</div>
					<div class="col-4">
						<div class="card shadow rounded-2 mt-4">
							<div class="card-body">
								<h3 class=" get-started">Staff Login</h3>
								<p class="card-text already-have">Don't have an account? <a class="register" href="/staff/create">Get
										Started</a></p>

								@if (!$errors->isEmpty())
									<div class="alert alert-danger" role="alert">
										<!-- Validation Errors -->
										<x-auth-validation-errors class="mb-4 text-red-600" :errors="$errors" />
									</div>
								@endif

								<form method="POST" action="{{ route('staff.login') }}">
									@csrf

									<!-- Name -->

									<div class="mb-3">
										<label for="nameInput" class="form-label">Email</label>
										<input type="email" class="form-control" id="email" type="email" name="email" required="required"
											autofocus="autofocus">
									</div>

									<!-- Password -->

									<div class="mb-5">
										<label for="password" class="form-label">Password</label>
										<input class="form-control" id="password" type="password" name="password" required="required"
											autocomplete="current-password" />
									</div>

									<div class="d-grid gap-2 ">
										<button class="btn btn-orange mt-7" type="submit">Login</button>
									</div>
								</form>


							</div>
						</div>
					</div>
				</div>
			</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
	 integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
	 integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>
</body>

</html>
