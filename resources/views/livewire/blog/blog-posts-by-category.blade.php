<main class="container">
    <h1 class="text-center bg-info  border-bottom my-3 shadow py-3 rounded text-black" style="font-family: 'Courier New', Courier, ">Posts For <sup>'</sup>{{ $posts->first()->category->title }}<sup>'</sup></h1>

    <div class="row mb-2">
      @foreach ($posts as $post)
      <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary">{{ $post->category->title }}</strong>
                  <h3 class="mb-0">{{ $post->title }}</h3>
                  <div class="mb-1 text-muted">{{ $post->created_at->format("M-d-Y") }}</div>
                  <p class="card-text mb-auto">{{ $post->description }}</p>
                  <a href="{{ route("blog.post",$post->id) }}" class="stretched-link"><b>Continue reading</b></a>
                </div>
                <div class="col-auto d-lg-block">
                    <img class="bd-placeholder-img" width="200" height="250" role="img" aria-label="Placeholder: Thumbnail" src="{{config('app.url')}}storage/{{ $post->image }}" alt="">
                </div>
            </div>
        </div>
      @endforeach
    </div>
  </main>
