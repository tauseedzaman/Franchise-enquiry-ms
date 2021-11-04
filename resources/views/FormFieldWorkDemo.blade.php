@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center text-success my-3 border-bottom">Field Work Demo</h1>        </div>
        <div class="col-md-8">
            {!! $post ? $post->content:"<h1 class='text-danger text-center'>No Content Found!</h1>" !!}

        </div>
    </div>
</div>
@endsection
