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
                    @auth

                   @if(auth()->user()->is_admin == 1)
                   <li class="nav-item   ">
                       <a class="nav-link menu_item" href="{{ route("admin.home") }}"><b>Admin</b></a>
                   </li>
                   @endif

                    @if(auth()->user()->is_agent == 1)
                    <li class="nav-item   ">
                        <a class="nav-link menu_item" href="{{ route("employee.index") }}"><b>CPanel</b></a>
                    </li>
                    @endif
                    @endauth
                    <li class="nav-item   ">
                        <a class="nav-link menu_item cursors-pionter" style="cursor: pointer" title="Logout" onclick="document.getElementById('logout').submit()"><b>Logout</b></a>
                    </li>
                    <form method="post" id="logout" action="{{ route('logout') }}">
                        @csrf
                    </form>
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
    @include("layouts.menu")
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
