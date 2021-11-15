<main>
    @if (!$create_jobMattor)
    @if (!$create_jobMattor && !$view_this_job_mattor)
    <div class="container">
        <div class="row  mt-4 justify-content-around">
            <div class="col-12">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info"><b> Manage My Job Mattor</b></h1>
            </div>
            <div class="col-10">

            </div>
            <div class="col-2 float-center ">
                        <center>
                            <button wire:click="show_create_jobMattor_form()" class="btn btn-block btn-primary  ml-auto" type="button"><b>New</b></button>
                        </center>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col my-3">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {!! session('message') !!}
                    </div>
                    @endif
                </div>
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <table class="table table-light ">
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-4">
                                    <input class="form-control" wire:model='search' type="search" name="search"
                                        placeholder="Search ticket...">
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-light" type="button" wire:click="changeOrder()">{{ $order ==
                                        "DESC" ? "⏫ Sort":"⏬ Sort" }} </button>
                                </div>
                            </div>
                        </div>
                        <thead class="card-header thead-white">
                            <th>
                                #
                            </th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Phone</th>
                            <th>Price (INR)</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </thead>
                        <style>
                            #needHover:hover {
                                background-color: lightblue;
                            }
                        </style>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr  class="cursor-pointer" style="cursor: pointer;" id="needHover">
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category }}</td>
                                    <td>{{ $post->phone }}</td>
                                    <td>{{ $post->price }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>
                                        <button class="btn " title="View this" wire:click.prevent="view_post({{ $post->id }})"
                                            style="background-color:rgb(14, 160, 46);color:rgb(255, 0, 0);border:none;padding:5px 10px;border-radius:40px;">View<i
                                                class="pe-7s-trash"></i></button>
                                        <button class="btn " title="delete this" wire:click.prevent="delete({{ $post->id }})"
                                            style="background-color:rgb(157, 160, 14);color:rgb(68, 0, 255);border:none;padding:5px 10px;border-radius:40px;">Edit<i
                                                class="pe-7s-trash"></i></button>
                                        <button class="btn " title="delete this" wire:click.prevent="delete({{ $post->id }})"
                                            style="background-color:rgb(157, 160, 14);color:rgb(255, 0, 0);border:none;padding:5px 10px;border-radius:40px;">Delete<i
                                                class="pe-7s-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-12 mx-auto ">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row  mt-4 justify-content-around">

            <div class="col-10">

            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col my-3">
                    <div class="card rounded-lg mt-2">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10">
                                    <h1 class=""><b>My Job Mattor #{{ $this_post->id }}</b></h1>
                                </div>
                                <div class="col-2 float-center ">
                                    <center>
                                        <button wire:click="return_back_to_list()" class="btn btn-block btn-warning  ml-auto" type="button"><b>Return Back</b></button>
                                    </center>
                        </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><b>Title: </b>{{ $this_post->title }}</h5>
                            <p class="card-text"><b>Description: </b>{{ $this_post->description }}</p>
                            <p class="card-text"><b>Category: </b>{{ $this_post->category }}</p>
                            <p class="card-text"><b>SubCategory: </b>{{ $this_post->subcategory }}</p>
                            <p class="card-text"><b>Location: </b>{{ $this_post->location }}</p>
                            <p class="card-text"><b>Website: </b>{{ $this_post->website }}</p>
                            <p class="card-text"><b>Email: </b>{{ $this_post->email }}</p>
                            <p class="card-text"><b>Contact No: </b>{{ $this_post->phone }}</p>
                            <p class="card-text"><b>WhatsApp: </b>{{ $this_post->whatsapp }}</p>
                            <p class="card-text"><b>Price (INR): </b>{{ $this_post->price }}</p>
                            <p class="card-text"><b>Images: </b>
                                <br>
                                @foreach ($this_post->files as $image)
                                   @if ($image->extension == "mp4")
                                   @else
                                   <img class="col-6" src="{{ config('app.url').$image->path }}" />
                                   @endif
                                   @endforeach
                                </p>
                                <p class="card-text"><b>video: </b>
                                    @foreach ($this_post->files as $image)
                                    @if ($image->extension == "mp4")
                                    <video controls src="{{ config('app.url').$image->path }}"></video>
                                    @else

                                    @endif
                                    @endforeach
                                </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    @endif
    @else
    <div class="container">
        <div class="row  mt-4 justify-content-around">
            <div class="col-12">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-success"><b> Create My Job Mattor</b></h1>
            </div>
            <div class="col-10">

            </div>
            <div class="col-2 float-center ">
                        <center>
                            <button wire:click="show_hide_jobMattor_form()" class="btn btn-block btn-primary  ml-auto" type="button"><b>Return Back</b></button>
                        </center>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col my-3">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {!! session('message') !!}
                    </div>
                    @endif
                </div>
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-body">
                        <form wire:submit.prevent='save_jobMattor()'>
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="form-group mt-2">
                                        <label for="name">Title</label>
                                        <input class="form-control @error("title") is-invalid @enderror" id="title"
                                            type="text" name="title" wire:model.defer="title"
                                            placeholder="Enter title" />
                                        @error("title") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-2 mt-3">
                                        <label for="description">Descriptions</label>
                                        <textarea name="description" wire:model.defer="description" rows="5" cols="80"
                                            class="form-control @error("description") is-invalid @enderror" placeholder="Descriptions"></textarea>
                                        @error('description') <span class="text-red-500 text-danger text-xs">{{ $message
                                            }}</span> @enderror
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="name">category</label>
                                        <input class="form-control @error("category") is-invalid @enderror" id="category"
                                            type="text" name="category" wire:model.defer="category"
                                            placeholder="Enter category" />
                                        @error("category") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="name">sub Category</label>
                                        <input class="form-control @error("subcategory") is-invalid @enderror" id="subcategory"
                                            type="text" name="subcategory" wire:model.defer="subcategory"
                                            placeholder="Enter sub category" />
                                        @error("subcategory") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="name">location</label>
                                        <input class="form-control @error("location") is-invalid @enderror" id="location"
                                            type="text" name="location" wire:model.defer="location"
                                            placeholder="Enter location" />
                                        @error("location") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="name">website</label>
                                        <input class="form-control @error("website") is-invalid @enderror" id="website"
                                            type="url" name="website" wire:model.defer="website"
                                            placeholder="Enter website" />
                                        @error("website") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="name">email</label>
                                        <input class="form-control @error("email") is-invalid @enderror" id="email"
                                            type="email" name="email" wire:model.defer="email"
                                            placeholder="Enter email" />
                                        @error("email") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="name">Contact No</label>
                                        <input class="form-control @error("phone") is-invalid @enderror" id="phone"
                                            type="text" name="phone" wire:model.defer="phone"
                                            placeholder="Enter phone" />
                                        @error("phone") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="name">whatsapp</label>
                                        <input class="form-control @error("whatsapp") is-invalid @enderror" id="whatsapp"
                                            type="url" name="whatsapp" wire:model.defer="whatsapp"
                                            placeholder="Enter whatsapp" />
                                        @error("whatsapp") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="name">price</label>
                                        <input class="form-control @error("price") is-invalid @enderror" id="price"
                                            type="number" name="price" wire:model.defer="price"
                                            placeholder="Enter price ( INR )" />
                                        @error("price") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                        <div class="form-file mt-2">
                                        <label for="name">Choose images</label>
                                            <input multiple class="form-control @error("images") is-invalid
                                                @enderror" id="images" type="file" name="images" wire:model="images"
                                                placeholder="Select images" />
                                                @error("images") <span class="text-danger px-3">{{ $message }} </span>
                                                @enderror
                                            </div>
                                    @if ($images)

                                   <div class="row mt-1">
                                    @foreach ($images as $image)
                                    <img class="col-4" src="{{ $image->temporaryUrl() }}" width="30%" />
                                    @endforeach
                                </div>
                                       @endif

                                       <div class="form-file mt-2">
                                        <label for="name">Short Video</label>
                                            <input class="form-control @error("video") is-invalid
                                                @enderror" id="video" type="file" name="video" wire:model="video"
                                                placeholder="Select video" />
                                                @error("video") <span class="text-danger px-3">{{ $message }} </span>
                                                @enderror
                                            </div>
                                </div>
                            </div>
                            <h3 id="timer" class="text-danger text-center "></h3>
                            <div class="mt-1 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit"
                                        id="btn"> <div class="spinner-border text-danger" wire:loading role="status"></div> Submit</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</main>
