<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Login Register Pages</h1>
                <div  >
                    @if (session()->has('message'))
                    <div class="alert alert-success"  >
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <button class="btn btn-warning" type="button" wire:click="show_from">Disable login/Register Page</button>
                @if (!$show_data)
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header"><h3 class="text-center font-weight-light my-2 text-secondary">{{ $btn_text }}</h3></div>
                    <div class="card-body">
                        <form wire:submit.prevent="save_disable()">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input class="form-control @error("title") is-invalid  @enderror" id="title" type="text" wire:model.lazy="title" autofocus placeholder="Enter title for Users" />
                                        @error("title") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="description">Message </label>
                                    <textarea id="description" class="form-control @error("description") is-invalid  @enderror" wire:model.lazy="description" name="description" rows="3" placeholder="Enter Message for Users"></textarea>
                                    @error("description") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" >{{ $btn_text }}</button></div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="row my-3">
        </div>
        @if ($show_data)
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-white table-hoverable">
                            <thead class="bg-success p-2">
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Dated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->created_at->format("M-d-Y") }}</td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="Actions">
                                            <center class="text-center">
                                            <button class="btn btn-danger" type="button" wire:click="delete({{ $post->id }})">Delete</button>
                                            <button class="btn btn-info" type="button" wire:click="edit({{ $post->id }})">Edit</button>
                                            </center>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</main>
