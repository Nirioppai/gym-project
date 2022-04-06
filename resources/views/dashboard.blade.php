@extends('layouts.member')

@section('title')
    VS Gym - Welcome
@endsection

@section('styles')
    <script src="https://kit.fontawesome.com/d3fbd9c521.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/member-custom.css') }}">
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
                <h1 class="barlow banner-header">My Account</h1>

                <p class="poppins">Your one stop for all of your membership needs and more!</p>
            </div>


        </div>

    </div>
@endsection

@section('mainContent')
    <div class="p-5 border">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Necessitatibus veniam ipsa earum quibusdam, atque ipsum error maiores
            natus iusto fugit id saepe neque rerum magni laudantium accusantium
            dolorem numquam quasi. df
        </p>
    </div>

    <div class="p-5 border">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Necessitatibus veniam ipsa earum quibusdam, atque ipsum error maiores
            natus iusto fugit id saepe neque rerum magni laudantium accusantium
            dolorem numquam quasi. df
        </p>
    </div>
    <div class="p-5 border">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Necessitatibus veniam ipsa earum quibusdam, atque ipsum error maiores
            natus iusto fugit id saepe neque rerum magni laudantium accusantium
            dolorem numquam quasi. df
        </p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- owl carousel -->
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('script.js') }}"></script>
@endsection
