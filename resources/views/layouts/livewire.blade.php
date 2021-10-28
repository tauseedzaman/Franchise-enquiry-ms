<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset("css/app.css") }}" />
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/animate.css") }}" />
    <script src="{{ asset("js/app.js") }}}">  </script>
    <script src="{{ asset("js/script.js") }}}">  </script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark py-3 border-bottom border-success" style="background-color: blueviolet;">
        <div class="container px-5 animated  ">
            <a class="navbar-brand " href="#" >
                <img class="img px-1 rounded-circle " width="50%" src="{{ asset("images/logo.png")}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <h4 class="mx-auto text-light"> <strong style="font-family: 'Lobster Two', cursive;font-size: 28px;">Franchise Enquiry </strong> </h4>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item   ">
                        <a class="nav-link menu_item" href="{{ url('/') }}"><b>Contact</b></a>
                    </li>
                    <li class="nav-item d-flex align-items-left ">
                        <ul class=" text-light " style="list-style: none;">
                            <li>ISO.No: 1111111111</li>
                            <li>Reg.No.1111111111</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="container-fluid bg-dark border-bottom">
            <div class="row">
                <div class="col ">
                    <nav class="nav p-1 d-flex justify-content-between ">
                        <li class="nav-item bg-primary rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">Home
                            </a>
                        </li>

                        <li class="nav-item bg-primary rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">Why Join</a>
                        </li>

                        <li class="nav-item bg-primary rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">About Us</a>
                        </li>

                        <li class="nav-item bg-primary rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">Mobile Work Demo</a>
                        </li>

                        <li class="nav-item bg-primary rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">Form Flip Work demo</a>
                        </li>

                        <li class="nav-item bg-primary rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">Ad's posting Demo</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid bg-dark shadow">
            <div class="row">
                <div class="col ">
                    <nav class="nav p-1 d-flex justify-content-between ">
                        <li class="nav-item bg-success rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">Our Service
                            </a>
                        </li>

                        <li class="nav-item bg-success rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">System Work </a>
                        </li>

                        <li class="nav-item bg-success rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">Feedback Video</a>
                        </li>

                        <li class="nav-item bg-success rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">Testimonial</a>
                        </li>

                        <li class="nav-item bg-success rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="#">Business Plan</a>
                        </li>

                        <li class="nav-item bg-success rounded my-1 mx-1">
                            <a class="nav-link text-dark  mx-md-4 mx-sr-auto mx-sr-0  " href="#">Blog</a>
                        </li>

                        <li class="nav-item bg-success rounded my-1 mx-1">
                            <a class="nav-link text-dark mx-md-4 mx-sr-auto " href="#">Download</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    {{ $slot }}
    <!-- Footer-->
    @include("layouts.footer")
    @livewireScripts
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('.carousel').carousel({
        interval: 2000
});
        </script>
</body>

</html>
