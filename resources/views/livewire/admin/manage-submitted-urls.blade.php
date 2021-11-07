<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Submitted URL's</h1>
                <div  >
                    @if (session()->has('message'))
                    <div class="alert alert-success"  >
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row my-3">
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1 class="text-center text-secondary  ">Submitted Urls ({{ $urls->count() }})</h1>
                        </div>
                    <div class="card-body">
                        <table class="table table-white table-hoverable">
                            <thead class="bg-warning p-2">
                                <tr>
                                    <th>#</th>
                                    <th>Link</th>
                                    <th>Dated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody wire:poll.30000ms>
                                @foreach ($urls as $url)
                                <tr>
                                    <td>{{ $url->id }}</td>
                                    <td><a href="{{ $url->url }}" target="__blank">{{ $url->url }}</a></td>
                                    <td>{{ $url->created_at->format("M-d-Y H:m") }}</td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="Actions">
                                            <center class="text-center">
                                            <button class="btn btn-danger" type="button" wire:click="reject({{ $url->id }})">Reject</button>
                                            <button class="btn btn-success" type="button" wire:click="approve({{ $url->id }})">Approve</button>
                                            </center>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>#</td>
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
    </div>
</main>
