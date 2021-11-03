<main>
    <div class="container">
        <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                            <div class="card-header">
                                <h1 class="text-center text-secondary  ">My WorkSheet</h1>
                            </div>
                        <div class="card-body">
                            <table class="table table-white table-hoverable">
                                <thead class="bg-success p-2">
                                    <tr>
                                        <td>#</td>
                                        <td>Url</td>
                                        <td>Dated</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($categories as $category)
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
                                    @endforeach --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>#</td>
                                        <td>Url</td>
                                        <td>Dated</td>
                                        <td>Status</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</main>


