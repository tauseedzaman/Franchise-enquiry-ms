@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center text-success my-3 border-bottom">Ad's Posting Demo</h1>        </div>
        <div class="col-md-8">
            {!! $post->content !!}
        </div>
    </div>
</div>
@endsection
