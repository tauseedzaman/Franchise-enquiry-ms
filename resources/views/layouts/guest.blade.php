<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Share Us</title>
        <link rel="stylesheet" href="{{ asset("css/app.css") }}" />

        <link rel="stylesheet" href="{{ asset("css/animate.css") }}" />
    <script src="{{ asset("js/app.js") }}}">  </script>
    <script src="{{ asset("js/script.js") }}}">  </script>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" /> --}}
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark py-3 border-bottom border-success" style="background-color: blueviolet;">
        <div class="container px-5 animated  ">
            <a class="navbar-brand " href="{{ url('') }}" >
                <img class="img px-1 rounded-circle " width="50%" src="{{ asset("images/logo.png")}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <h4 class="mx-auto text-light"> <strong style="font-family: 'Lobster Two', cursive;font-size: 28px;"><a href="{{ url('/') }}" class="text-light  nav-link">Franchise Enquiry </a></strong> </h4>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link menu_item" href="{{ route("register") }}"><b>Register</b></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link  menu_item" href="{{ route("login") }}"><b>Login</b></a>
                    </li>
                    <li class="nav-item   ">
                        <a class="nav-link menu_item" href="{{ route('contactus') }}"><b>Contact</b></a>
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
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#slide1" data-slide-to="0" class="active"></li>
              <li data-target="#slide2" data-slide-to="1"></li>
              <li data-target="#slide3" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active" style="width: 100%;height:400px">
                <img class="d-block w-100" src="{{ asset("images/slider/slider-1.jpg") }}" alt="First slide">
                <div class="carousel-caption shadow rounded d-none d-md-block bg-dark text-info">
                    <h5>Advertisers interested in our services to promote their Products / Services / Website can <br> <a href="">Contact us</a>  </h5>
                  </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset("images/slider/slider-2.jpg") }}" alt="Second slide">
                 <div class="carousel-caption shadow rounded d-none d-md-block bg-dark text-info">
                    <h5>Advertisers interested in our services to promote their Products / Services / Website can <br> <a href="">Contact us</a>  </h5>
                  </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset("images/slider/slider-3.jpg") }}" alt="Third slide">
                 <div class="carousel-caption shadow rounded d-none d-md-block bg-dark text-info">
                    <h5>Advertisers interested in our services to promote their Products / Services / Website can <br> <a href="">Contact us</a>  </h5>
                  </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#slider1" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider2" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </section>
    @include('layouts.menu')
    @yield("content")
    <!-- Footer-->
    @include('layouts.footer')
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
