<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Employees</h1>
                <div  >
                    @if (session()->has('message'))
                    <div class="alert alert-success"  >
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <button class="btn btn-warning" type="button" wire:click="show_from">Add Employee</button>
                @if (!$show_data)
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header"><h3 class="text-center font-weight-light my-2 text-secondary">{{ $btn_text }}</h3></div>
                    <div class="card-body">
                        <form wire:submit.prevent="save_agent()">
                            <div class="row mb-3">
                                <div class="col">
                                <div class="form-group">
                                    <label for="user">User</label>
                                    <select id="user" class="form-control" wire:model.defer='user' name="user">
                                        <option>Choose User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name ."---".$user->email }}</option>
                                        @endforeach
                                    </select>
                                    @error("user") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <label for="role">Role</label>
                                    <select id="role" class="form-control" wire:model.defer='role' name="role">
                                        <option>Choose Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error("role") <span class="text-danger px-3" >{{ $message }} </span> @enderror
                                </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <div class="btn-group" role="group" aria-label="Button group">
                                        <button class="btn btn-warning" type="button" wire:click="hide_form()" >Cancel</button>
                                    <button class="btn btn-success" type="submit" >{{ $btn_text }}</button>
                                    </div>
                                </div>
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
                            <h1 class="text-center text-secondary  ">All Employees</h1>
                        </div>
                    <div class="card-body">
                        <table class="table table-white table-hoverable">
                            <thead class="bg-success p-2">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created_at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agents as $agent)
                                <tr>
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $agent->user->name }}</td>
                                    <td>{{ $agent->user->email }}</td>
                                    <td>
                                        @foreach ($agent->roles as $agentRole)
                                        {{ $agentRole->name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $agent->created_at->format("M-d-Y") }}</td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="Actions">
                                            <center class="text-center">
                                            <button class="btn btn-danger" type="button" wire:click="delete({{ $agent->id }})">Delete</button>
                                            <button class="btn btn-info" type="button" wire:click="edit({{ $agent->id }})">Edit</button>
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
