<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Downloads Page Content</h1>
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <button class="btn btn-warning" type="button" wire:click="show_form()">Add Content</button>
                @if (!$show_data)
                <div class="card my-4  shadow-lg  rounded-lg mt-2">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-2 text-success">{{ $btn_text }}</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="save_content()">
                            <div class="row mb-3">
                                <div class="col">

                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input class="form-control @error(" title") is-invalid @enderror" id="title"
                                            type="text" wire:model.deffer="title" name="title" autofocus
                                            placeholder="Enter title" />
                                        @error("title") <span class="text-danger px-3">{{ $message }} </span> @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control @error(" description") is-invalid
                                        @enderror" wire:model.deffer="description" name="description" rows="3"
                                        placeholder="Enter Description"></textarea>
                                    @error("description") <span class="text-danger px-3">{{ $message }} </span>
                                    @enderror
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="file" class="form-control-label">File</label>
                                    <input id="file" class="form-control  @error(" file") is-invalid @enderror"
                                        wire:model.deffer="file" type="file" name="file">
                                    @error("file") <span class="text-danger px-3">{{ $message }} </span> @enderror
                                </div>

                            </div>
                            <br>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button class="btn btn-success btn-block" type="submit">
                                    <span wire:loading class="spinner-border spinner-border-sm"></span>
                                    {{ $btn_text }}

                                </button></div>
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
                    <div class="card-header">
                        <h1 class="text-center text-secondary  ">All Content</h1>
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
                                @foreach ($posts as $businessPlan)
                                <tr>
                                    <td>{{ $businessPlan->id }}</td>
                                    <td>{{ $businessPlan->title }}</td>
                                    <td>{{ $businessPlan->description }}</td>
                                    <td>{{ $businessPlan->created_at->format("M-d-Y") }}</td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="Actions">
                                            <center class="text-center">
                                                <button class="btn btn-danger" type="button"
                                                    wire:click="delete({{ $businessPlan->id }})">Delete</button>
                                                <button class="btn btn-info" type="button"
                                                    wire:click="edit({{ $businessPlan->id }})">Edit</button>
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
