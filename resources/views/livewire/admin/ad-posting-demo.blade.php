<div class="content">
    {{-- CKE editor link --}}
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <main>
        <div class="container">
                <div class="row justify-content-center">
                <div class="col">
                    <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Add's Posting Demos</h1>
                    <div  >
                        @if (session()->has('message'))
                        <div class="alert alert-success"  >
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
    <div class="row " style="">
        <div class="col ">
            <a href="{{ route('admin.AdPostingDemo.create') }}" class="btn btn-primary ">Add New Add's Posting Demo</a>
            <h3 class="text-capitalize border-bottom pl-3 p-3 text-info  shadow text-center mt-2 bg-dark ">{{ _('All  Demos') }}</h3>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped" style="" id="">
                    <thead>
                        <tr class="text-primary bg-light">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Dated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $adPostingDemo)
                            <tr>
                                <td>{{ $adPostingDemo->id }}</td>
                                <td>{{ $adPostingDemo->title }}</td>
                                <td>{{ $adPostingDemo->description }}</td>
                                <td>{{ $adPostingDemo->status ? "Active" : "Not Active" }}</td>
                                <td>{{ $adPostingDemo->created_at->format("D-M-Y") }}</td>
                                <td class="text-right">
                                    <button class="btn " title="delete this" wire:click.prevent="delete({{ $adPostingDemo->id }})"
                                        style="background-color:rgb(157, 160, 14);color:rgb(255, 0, 0);border:none;padding:5px 10px;border-radius:40px;">Delete<i
                                            class="pe-7s-trash"></i></button>
                                    <a href="{{ route('admin.AdPostingDemo.edit',$adPostingDemo->id) }}" class="btn "
                                        style="background-color:chartreuse;color:blue;border:none;padding:5px 10px;border-radius:40px;">Edit<i
                                            class="pe-7s-pen"></i></a>
                                </td>
                            </tr>
                        @empty
                           <h1 class="text-center">No Record Found!</h1>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

</div>
</div>

</div>
