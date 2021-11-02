<div class="content">
    {{-- CKE editor link --}}
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <main>
        <div class="container">
                <div class="row justify-content-center">
                <div class="col">
                    <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage System Work Page</h1>
                    <div  >
                        @if (session()->has('message'))
                        <div class="alert alert-success"  >
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
    <div class="row " style="">
        <div class="col ">
            <a href="{{ route("admin.systemWork.create") }}" class="btn btn-primary ">Add Another System Work Page Content</a>
            <br>
            <br>
            <small class="my-5 p-1 text-center alert-warning">Note: only the latest active record will be displayed on the end user page</small>
            <h3 class="text-capitalize border-bottom pl-3 p-3 text-info  shadow text-center mt-2 bg-dark ">{{ _('All Records') }}</h3>
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
                        @forelse ($posts as $systemWork)
                            <tr>
                                <td>{{ $systemWork->id }}</td>
                                <td>{{ $systemWork->title }}</td>
                                <td>{{ $systemWork->description }}</td>
                                <td>{{ $systemWork->status ? "Active" : "Not Active" }}</td>
                                <td>{{ $systemWork->created_at->format("D-M-Y") }}</td>
                                <td class="text-right">
                                    <button class="btn " title="delete this" wire:click.prevent="delete({{ $systemWork->id }})"
                                        style="background-color:rgb(157, 160, 14);color:rgb(255, 0, 0);border:none;padding:5px 10px;border-radius:40px;">Delete<i
                                            class="pe-7s-trash"></i></button>
                                    <a href="{{ route("admin.systemWork.edit",$systemWork->id) }}" class="btn "
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
