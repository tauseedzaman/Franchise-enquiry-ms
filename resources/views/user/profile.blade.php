@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center text-success my-3 border-bottom">Profile</h1>        </div>
        <div class="col-md-8">

<section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h3 class="dark-color"><b>{{ auth()->user()->name }}</b></h3>
                    <div class="row about-list">
                        <div class="col">
                            <div class="media">
                                <label>Joined On : </label>
                                <p> {{ auth()->user()->created_at->format(" d M Y") }}</p>
                            </div>
                            <div class="media">
                                <label>Age</label>
                                <p>22 Yr</p>
                            </div>
                            <div class="media">
                                <label>Residence</label>
                                <p>Canada</p>
                            </div>
                            <div class="media">
                                <label>Address</label>
                                <p>California, USA</p>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="media">
                                <label>E-mail</label>
                                <p>info@domain.com</p>
                            </div>
                            <div class="media">
                                <label>Phone</label>
                                <p>820-885-3321</p>
                            </div>
                            <div class="media">
                                <label>Skype</label>
                                <p>skype.0404</p>
                            </div>
                            <div class="media">
                                <label>Freelance</label>
                                <p>Available</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-avatar">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                </div>
            </div>
        </div>
        <div class="counter">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                        <p class="m-0px font-w-600">Happy Clients</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                        <p class="m-0px font-w-600">Project Completed</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                        <p class="m-0px font-w-600">Photo Capture</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                        <p class="m-0px font-w-600">Telephonic Talk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>
@endsection
