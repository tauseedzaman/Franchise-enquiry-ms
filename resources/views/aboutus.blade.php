@extends("layouts.guest")
@section("content")

<div class="container-fluid">
    <div class="row">
        <div class="col mt-1">
            <h1 class="text-center my-4 border-bottom ">About {{ config("app.name") }} </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 p-3">
            <img class="img-fluid rounded shadow" src="{{ asset("images/slider/slider-3.jpg") }}" alt="">
        </div>
        <div class="col">
            <p class="p-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia officiis, itaque nam aliquam nisi quas explicabo omnis cupiditate laboriosam esse aspernatur ullam tenetur. Est necessitatibus quae maiores, animi magni placeat?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia officiis, itaque nam aliquam nisi quas explicabo omnis cupiditate laboriosam esse aspernatur ullam tenetur. Est necessitatibus quae maiores, animi magni placeat?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia officiis, itaque nam aliquam nisi quas explicabo omnis cupiditate laboriosam esse aspernatur ullam tenetur. Est necessitatibus quae maiores, animi magni placeat?
            </p>
           </div>
        <div class="row">
            <div class="col mt-2 mx-auto">
                <h1 class="border-bottom text-center">Who we are</h1>
                <p class="p-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero omnis ratione nisi cumque porro excepturi quibusdam reprehenderit eum perferendis explicabo nulla, voluptate, aliquid ab dolor harum ipsum, neque iusto eligendi?</p>
            </div>
        </div>
    </div>
</div>

@endsection
