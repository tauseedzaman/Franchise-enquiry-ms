<div class="col-md-4 py-4  ">
    <div class="" style="top: 2rem;">
      <div class="p-4 bg-light rounded">
        <h4 class="fst-italic">Categories</h4>
      </div>
      <div class="p-4 ">
          <ul class="list-group list-unstyled">
              @foreach ($categories as $category)
                  <li class=" "><a href="{{ route("blog.posts.category",$category->id) }}" class="a nav-link m-0 p-0"><strong> 👉 {{ $category->title }}</strong></a></li>
              @endforeach
        </ul>
      </div>
    </div>
  </div>
