@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="text-center text-success my-3 border-bottom">Why Join Us</h1>
        </div>
        <div class="col-md-12">
            {!! $post->content !!}
        </div>
    </div>
</div>
@endsection
