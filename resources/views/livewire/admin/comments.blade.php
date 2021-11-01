<div class="content">
    <main>
        <div class="container">
                <div class="row justify-content-center">
                <div class="col">
                    <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info">Manage Comments</h1>
                    <div  >
                        @if (session()->has('message'))
                        <div class="alert alert-success"  >
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
    <div class="row " style="">
        <div class="col ">
            <h3 class="text-capitalize border-bottom pl-3 p-3 text-info  shadow text-center mt-2 bg-dark ">{{ _('Post Comments') }}</h3>
            <div class="form-group">
                <label for="post" class="text-success">Choose Post to see it's comments</label>
                <select id="post" wire:model="postId" class="form-control" name="post">
                    @foreach ($posts as $post)
                    <option value="{{ $post->id }}">{{ $post->title }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped" style="" id="">
                    <thead>
                        <tr class="text-primary bg-light">
                            <th>ID</th>
                            <th>post id</th>
                            <th>Comment</th>
                            <th>Auther</th>
                            <th>Dated</th>
                            <th class="text-danger">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->post_id }}</td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <button class="btn " title="delete this" wire:click.prevent="delete({{ $comment->id }})"
                                        style="background-color:rgb(157, 160, 14);color:rgb(255, 0, 0);border:none;padding:5px 10px;border-radius:40px;"><i
                                            class="pe-7s-trash">Delete</i></button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
</div>

</div>
