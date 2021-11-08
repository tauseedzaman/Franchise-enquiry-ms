@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow my-3">
                <h1 class="card-header text-center">{{ $message->title }}</h2>
                <h4 class="card-text p-2">{{ $message->description }}</h4>

            </div>
        </div>
    </div>
</div>
@endsection
