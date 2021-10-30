<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Feedback Videos</h1>
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
                        <form wire:submit.prevent="save_feedback()">
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Feedback Title</label>
                                        <input class="form-control @error("title") is-invalid  @enderror" id="title" type="text" wire:model.lazy="title"  placeholder="Enter Feedback title" />
                                        @error("title") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">User</label>
                                        <input class="form-control @error("user") is-invalid  @enderror" id="user" type="text" wire:model.lazy="user"  placeholder="Enter Feedback user" />
                                        @error("user") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Video Frame</label>
                                        <input class="form-control @error("video") is-invalid  @enderror" id="video" type="text" wire:model.lazy="video"  placeholder="Enter Feedback video" />
                                        @error("video") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                    </div>
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
                            <h1 class="text-center text-secondary  ">All Video FeedBacks</h1>
                        </div>
                    <div class="card-body">
                        <table class="table table-white table-hoverable">
                            <thead class="bg-success p-2">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>User</th>
                                    <th>Video</th>
                                    <th>Dated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $feedback->id }}</td>
                                    <td>{{ $feedback->title }}</td>
                                    <td>{{ $feedback->user }}</td>
                                    <td class="" style="width: 10px;height:10px">
                                        <div>
                                            {!! $feedback->video !!}
                                        </div>
                                    </td>
                                    <td>{{ $feedback->created_at->format("M/d/Y") }}</td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="Actions">
                                            <button class="btn btn-danger" type="button" wire:click="delete({{ $feedback->id }})">Delete</button>
                                            <button class="btn btn-info" type="button" wire:click="edit({{ $feedback->id }})">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>Title</td>
                                    <td>User</td>
                                    <td>Video</td>
                                    <td>Dated</td>
                                    <td>Actions</td>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $feedbacks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
