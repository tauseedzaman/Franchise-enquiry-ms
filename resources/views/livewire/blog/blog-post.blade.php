<main class="container my-4">
        <img class="img-fluid " style="" width="100%" src="{{ config("app.url") }}storage/{{ $post->image }}" alt="">
    <div class="row g-5">
      <div class="col-md-8">
        <article class="blog-post">
            <br />
          <h2 class="blog-post-title">{{ $post->title }}</h2>
          <p class="blog-post-meta">{{ $post->created_at->format("M D, Y")}} by <span class="text-info">{{ $post->user->name }}</span></p>
          {!! $post->content !!}
        </article>
        <nav class="blog-pagination" aria-label="Pagination">
          <a class="btn btn-outline-primary" href="{{ route("blog.post",($p_id+1)) }}">Older</a>
          <a class="btn btn-outline-secondary" href="{{ route("blog.post",($p_id-1)) }}" tabindex="-1" aria-disabled="true">Newer</a>
        </nav>
      </div>
    @livewire("blog.category")
    </div>

    <div class="row">
        <div class="col-12">
        <h1 class="text-center border-bottom bg-success py-2">Comments ({{ $comments->count()}})</h1>
        @foreach ($comments as $comment)
        <div class="col-12 my-2">
            <div class="card">
                <div class="card-body p-2 ">
                    <h5 class="card-title text-info border-bottom">👤 {{ $comment->user->name }}</h5>
                    <p class="card-text">{{ $comment->content }} <span class="float-right text-success">on {{ $comment->created_at->format("d-M-Y:H-m") }}</span> </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    <div class="row">
        <div class="col-12">
        <form wire:submit.prevent="save_comment()" class="my-3 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="comment">Your Comments</label>
                            <textarea id="comment" class="form-control" placeholder="Write Comment...." wire:model.deffer="comment" name="comment" rows="3"></textarea>
                        </div>
                        <button class="btn btn-outline-success mt-3 btn-block" type="submit" >Comment</button>
                    </div>
                </div>
        </form>
    </div>
</div>
        </div>
    </div>
  </main>
