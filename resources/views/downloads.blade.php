@extends('layouts.guest')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-center text-success col my-3 border-bottom">Downloads</h1>
    </div>
    <div class="col-12">
        @foreach ($posts as $post)
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <h3 class="mb-0">{{ $post->title }}</h3>
              <div class="mb-1 text-muted">Posted on {{ $post->created_at->format("M-d-Y") }}</div>
              <p class="mb-auto">{{ $post->description }}</p>
              <div>
                <a href="{{ $post->file }}" class=" btn btn-success my-3 ">Download</a>
              </div>
            </div>
        @endforeach
    </div>
</div>
</div>
@endsection
