<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Categories</h1>
                <div  >
                    @if (session()->has('message'))
                    <div class="alert alert-success"  >
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header"><h3 class="text-center font-weight-light my-2 text-secondary">{{ $btn_text }}</h3></div>
                    <div class="card-body">
                        <form wire:submit.prevent="save_category()">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Category Title</label>
                                        <input class="form-control @error("title") is-invalid  @enderror" id="title" type="text" wire:model.lazy="title" autofocus placeholder="Enter Category title" />
                                        @error("title") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control @error("description") is-invalid  @enderror" wire:model.lazy="description" name="description" rows="3" placeholder="Enter Category Description"></textarea>
                                    @error("description") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" >{{ $btn_text }}</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1 class="text-center text-secondary  ">All Categories</h1>
                        </div>
                    <div class="card-body">
                        <table class="table table-white table-hoverable">
                            <thead class="bg-success p-2">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Dated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->created_at->format("M-d-Y") }}</td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="Actions">
                                            <center class="text-center">
                                            <button class="btn btn-danger" type="button" wire:click="delete({{ $category->id }})">Delete</button>
                                            <button class="btn btn-info" type="button" wire:click="edit({{ $category->id }})">Edit</button>
                                            </center>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>Title</td>
                                    <td>Description</td>
                                    <td>Dated</td>
                                    <td>Actions</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
