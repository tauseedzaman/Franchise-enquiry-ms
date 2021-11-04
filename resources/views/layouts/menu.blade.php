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
<section>
    <div class="container-fluid bg-dark border-bottom">
        <div class="row">
            <div class="col ">
                <nav class="nav p-1 d-flex justify-content-between ">
                    <li class="nav-item bg-primary rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("home") }}">Home
                        </a>
                    </li>

                    <li class="nav-item bg-primary rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("whay-join") }}">Why Join</a>
                    </li>

                    <li class="nav-item bg-primary rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("aboutus") }}">About Us</a>
                    </li>

                    <li class="nav-item bg-primary rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("mobile.work.demo") }}">Mobile Work Demo</a>
                    </li>

                    <li class="nav-item bg-primary rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("form.field.Work.demo") }}">Flield Work demo</a>
                    </li>

                    <li class="nav-item bg-primary rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("Ad.posting.Demo") }}">Ad's posting Demo</a>
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
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("our.services") }}">Our Service
                        </a>
                    </li>

                    <li class="nav-item bg-success rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("System.Work") }}">System Work </a>
                    </li>

                    <li class="nav-item bg-success rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("feedback.video") }}">Feedback Video</a>
                    </li>

                    <li class="nav-item bg-success rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("testimonial") }}">Testimonial</a>
                    </li>

                    <li class="nav-item bg-success rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto  " href="{{ route("BusinessPlans") }}">Business Plan</a>
                    </li>

                    <li class="nav-item bg-success rounded my-1 mx-1">
                        <a class="nav-link text-dark  mx-md-4 mx-sr-auto mx-sr-0  " href="{{ route("blog") }}">Blog</a>
                    </li>

                    <li class="nav-item bg-success rounded my-1 mx-1">
                        <a class="nav-link text-dark mx-md-4 mx-sr-auto " href="{{ route("Downloads") }}">Download</a>
                    </li>
                </nav>
            </div>
        </div>
    </div>
</section>
