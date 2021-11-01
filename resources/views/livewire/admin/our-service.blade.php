<div class="content">
    {{-- CKE editor link --}}
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <main>
        <div class="container">
                <div class="row justify-content-center">
                <div class="col">
                    <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Our Services</h1>
                    <div  >
                        @if (session()->has('message'))
                        <div class="alert alert-success"  >
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
    <div class="row " style="">
        <div class="col ">
            <a href="{{ route("admin.our.service.create") }}" class="btn btn-primary ">Add Another Our Service Page Content</a>
            <br>
            <small class="my-3 alert-info">Note: only the latest active record will be displayed on the end user page</small>
            <h3 class="text-capitalize border-bottom pl-3 p-3 text-info  shadow text-center mt-2 bg-dark ">{{ _('All Services Records') }}</h3>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped" style="" id="">
                    <thead>
                        <tr class="text-primary bg-light">
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Dated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->status ? "Active" : "Not Active" }}</td>
                                <td>{{ $post->created_at->format("D-M-Y") }}</td>
                                <td class="text-right">
                                    <button class="btn " title="delete this" wire:click.prevent="delete({{ $post->id }})"
                                        style="background-color:rgb(157, 160, 14);color:rgb(255, 0, 0);border:none;padding:5px 10px;border-radius:40px;">Delete<i
                                            class="pe-7s-trash"></i></button>
                                    <a href="{{ route("admin.our.service.edit",$post->id) }}" class="btn "
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
