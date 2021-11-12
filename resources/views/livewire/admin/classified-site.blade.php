<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Classified Sites</h1>
                <div  >
                    @if (session()->has('message'))
                    <div class="alert alert-success"  >
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                @if ($show_data)
                <button class="btn btn-warning" type="button" wire:click="show_from">Add Classified Site</button>
                @endif
                @if (!$show_data)
                <button class="btn btn-primary" type="button" wire:click="hide_form">View All Website</button>
                @endif
                @if (!$show_data)
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header"><h3 class="text-center font-weight-light my-2 text-secondary">{{ $btn_text }}</h3></div>
                    <div class="card-body">
                        <form wire:submit.prevent="save_site()">
                            <div class="row mb-3">
                                <div class="col">
                                    <br>
                                    <br>
                                    <div class="form-group mt-3">
                                        <label for="name">Name</label>
                                        <input class="form-control @error("name") is-invalid  @enderror" id="name" type="text" wire:model.defer="name" autofocus placeholder="Enter Website name" />
                                        @error("name") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group mt-3">
                                    <label for="link">Link</label>
                                    <textarea id="link" class="form-control @error("link") is-invalid  @enderror" wire:model.defer="link" name="link" rows="3" placeholder="Enter Website link"></textarea>
                                    @error("link") <span class="text-danger px-3" >{{ $message }} </span> @enderror
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
                        <div class="card-header">
                            <h1 class="text-center text-secondary  ">All Websites</h1>
                        </div>
                    <div class="card-body">
                        <table class="table table-white table-hoverable">
                            <thead class="bg-success p-2">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Dated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sites as $site)
                                <tr>
                                    <td>{{ $site->id }}</td>
                                    <td>{{ $site->name }}</td>
                                    <td>{{ $site->link }}</td>
                                    <td>{{ $site->created_at->format("M-d-Y") }}</td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="Actions">
                                            <center class="text-center">
                                            <button class="btn btn-danger" type="button" wire:click="delete({{ $site->id }})">Delete</button>
                                            <button class="btn btn-info" type="button" wire:click="edit({{ $site->id }})">Edit</button>
                                            </center>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>Name</td>
                                    <td>Link</td>
                                    <td>Dated</td>
                                    <td>Actions</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</main>
