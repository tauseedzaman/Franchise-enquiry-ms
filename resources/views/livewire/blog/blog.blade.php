<main class="container">
    <h1 class="text-center bg-info  border-bottom my-3 shadow py-3 rounded text-black" style="font-family: 'Courier New', Courier, ">{{ config("app.name") }} Blog</h1>
    <div class="row">

        <div class="col-md-8">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">{{ $posts->first()->category->title }}</strong>
                <h3 class="mb-0">{{ $posts->first()->title }}</h3>
                <div class="mb-1 text-muted">{{ $posts->first()->created_at->format("M-d-Y") }}</div>
                <p class="mb-auto">{{ $posts->first()->description }}</p>
                <a href="{{ route("blog.post",$posts->first()->id) }}" class="stretched-link">Continue reading</a>
              </div>
              <div class="col-auto d-lg-block">
                <img class="bd-placeholder-img" width="200" height="250" role="img" aria-label="Placeholder: Thumbnail" src="storage/{{ $posts->first()->image }}" alt="">
            </div>
            </div>

        </div>

      @livewire("blog.category")
    </div>
    <div class="row mb-2">

      @foreach ($posts as $post)
      @if ($loop->first)
          @continue
      @else
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
                    <img class="bd-placeholder-img" width="100%" height="250" role="img" aria-label="Placeholder: Thumbnail" src="storage/{{ $post->image }}" alt="">
                </div>
            </div>
        </div>
        @endif
      @endforeach
    </div>
  </main>
