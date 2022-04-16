@extends('layouts.member')

@section('title')
    VS Gym - Gym Name
@endsection

@section('styles')
    <script src="https://kit.fontawesome.com/d3fbd9c521.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/member-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stepper.css') }}">
@endsection

@section('navbar')
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto"></div>
        <ul class="navbar-nav">

            <li class="nav-item dropdown">
                <a id="navtext4" class="nav-link text-light" href="#"> </a>
            </li>

            <li class="nav-item dropdown">
                <a id="navtext5" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa fa-gear cursor-pointer"></i>
                </a>
                <ul id="navdrop" class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">

                    <li>
                        <a class="dropdown-item" href="/user-logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('banner')
    <div class="masthead" style="background-image: url('{{ asset('img/banner-half-img.jpg') }}');">
        <div class="color-overlay d-flex flex-column justify-content-center text-left ">
            <div class="container ">
                <h1 class="barlow banner-header">Gym Name</h1>

                <p class="poppins">Gym Location</p>
            </div>


        </div>

    </div>
@endsection

@section('mainContent')
    <div class="container">

        <form action="" method="post" id="registration">
            <nav>
              <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                <a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1">Step 1</a>
                <a class="nav-link" id="step2-tab" data-bs-toggle="tab" href="#step2">Step 2</a>
                <a class="nav-link" id="step3-tab" data-bs-toggle="tab" href="#step3">Step 3</a>
                <a class="nav-link" id="step3-tab" data-bs-toggle="tab" href="#step4">Step 4</a>
              </div>
            </nav>
            <div class="tab-content py-4">
              <div class="tab-pane fade show active" id="step1">
                <h4>Select Plan</h4>
                <div class="mb-3">
                  <label for="gym_plan">GymPlan</label>
                  <input type="text" name="gym_plan" class="form-control" id="gym_plan">
                </div>
              </div>
              <div class="tab-pane fade" id="step2">
                <h4>Personal Information</h4>
                <div class="mb-3">
                  <label for="field4">Required field 1</label>
                  <input type="text" name="field4" class="form-control" id="field4" required>
                </div>
                <div class="mb-3">
                  <label for="field5">Optional field</label>
                  <input type="text" name="field5" class="form-control" id="field5">
                </div>
                <div class="mb-3">
                  <label for="textarea1">Required field 2</label>
                  <textarea name="textarea1" rows="5" class="form-control" id="textarea1" required></textarea>
                </div>
              </div>
              <div class="tab-pane fade" id="step3">
                <h4>Payment</h4>
                <div class="mb-3">
                  <label for="first_name">Required field 1</label>
                  <input type="text" class="form-control-plaintext" value="Lorem ipsum dolor sit amet">
                </div>
                <div class="mb-3">
                  <label for="first_name">Optional field</label>
                  <input type="text" class="form-control-plaintext" value="Lorem ipsum dolor sit amet">
                </div>
                <div class="mb-3">
                  <label for="first_name">Required field 2</label>
                  <input type="text" class="form-control-plaintext" value="Lorem ipsum dolor sit amet">
                </div>
              </div>
              <div class="tab-pane fade" id="step4">
                <h4>Confirmation</h4>
                <div class="mb-3">
                  <label for="first_name">Required field 1</label>
                  <input type="text" class="form-control-plaintext" value="Lorem ipsum dolor sit amet">
                </div>
                <div class="mb-3">
                  <label for="first_name">Optional field</label>
                  <input type="text" class="form-control-plaintext" value="Lorem ipsum dolor sit amet">
                </div>
                <div class="mb-3">
                  <label for="first_name">Required field 2</label>
                  <input type="text" class="form-control-plaintext" value="Lorem ipsum dolor sit amet">
                </div>
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col-auto"><button type="button" class="btn btn-secondary" data-enchanter="previous">Previous</button></div>
              <div class="col-auto">
                <button type="button" class="btn btn-primary" data-enchanter="next">Next</button>
                <button type="submit" class="btn btn-primary" data-enchanter="finish">Finish</button>
              </div>
            </div>
          </form>

    </div>
@endsection

@section('bodyScript')
    <script type="text/javascript">
        var nav = document.getElementById('nav');
        var navtext1 = document.getElementById('navtext1')
        var brandnav = document.getElementById('brandnav')
        var navdrop = document.getElementById('navdrop')

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                nav.classList.add('bgFrosty', 'shadow');
                navtext4.classList.add('text-dark');
                navtext5.classList.add('text-dark');
                brandnav.classList.add('text-dark');
                navdrop.classList.remove('dropdown-menu-dark')
            } else {
                nav.classList.remove('bgFrosty', 'shadow');
                navtext4.classList.remove('text-dark');
                navtext5.classList.remove('text-dark');
                brandnav.classList.remove('text-dark');
                navdrop.classList.add('dropdown-menu-dark')
            }
        });
    </script>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script src="{{ asset('js/enchanter.js') }}"></script>
    <script>
        var registrationForm = $('#registration');
        var formValidate = registrationForm.validate({
          errorClass: 'is-invalid',
          errorPlacement: () => false
        });
    
        const wizard = new Enchanter('registration', {}, {
          onNext: () => {
            if (!registrationForm.valid()) {
              formValidate.focusInvalid();
              return false;
            }
          }
        });
      </script>

@endsection
