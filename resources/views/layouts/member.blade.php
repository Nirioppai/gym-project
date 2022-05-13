<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/landing.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/landing-custom.min.css') }}" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Poppins:wght@200&display=swap"
		rel="stylesheet">
	@yield('styles')
</head>

<body>
	<!-- Navbar  -->
	<nav id="nav" class="navbar fixed-top navbar-expand-lg navbar-light p-md-3">
		<div class="container">
			<a id="brandnav" class="navbar-brand text-light" href="/">VS Gym</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			@yield('navbar')
		</div>
	</nav>

	@yield('banner')

	<div class="container my-5 d-grid gap-5">
		@yield('mainContent')
	</div>

	<script src="{{ asset('js/landing.bundle.min.js') }}"></script>
	@yield('bodyScript')
</body>

</html>
