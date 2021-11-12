<main>
    <div class="container" wire:poll.60000ms>
        <div class="row  mt-4 justify-content-around">
            <div class="col ">
                <h1 class=""><b>My Ticket</b></h1>
            </div>
            <div class="col float-right text-right ">
                <a href="{{ route("auth.supportTeckets") }}" class="btn btn-primary" type="button"><b>Return To
                        Tickets</b></a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col my-3">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {!! session('message') !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-header border-bottom bg-light">
                        <div class="row ">
                            <div class="col">
                                <h3>{{ $ticket->subject }}</h3>
                            </div>
                            <div class="col text-right ml-auto ">
                                {{ $ticket->created_at->diffForHumans() }}
                                <button class="btn btn-outline-dark ml-2" type="button"
                                    wire:click="show_reply_form()">Reply</button>
                            </div>
                        </div>
                    </div>
                    @if ($show_reply_form)
                    <div class="card shadow-lg border-0 rounded-lg mt-1">
                        <div class="card-body">
                            <form wire:submit.prevent='save_ticket_reply()'>
                                <div class="row mb-1">
                                    <div class="col">
                                        <input type="hidden" wire:model="cid" value="{{ $ticket->id }}">
                                        <div class="custom-file mt-3">
                                            <label for="images" class="custom-file-label">Choose Images</label>
                                            <input multiple class="custom-file-input @error(" images") is-invalid
                                                @enderror" id="images" type="file" name="images" wire:model="images"
                                                placeholder="Enter ticket images" autofocus />
                                            @error("images.*") <span class="text-danger px-3">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        @if ($images)
                                        <div class="row">
                                            @foreach ($images as $image)
                                            <img class="col-4" src="{{ $image->temporaryUrl() }}" width="30%" />
                                            @endforeach
                                        </div>
                                        @endif

                                        <div class="form-group mt-2">
                                            <label for="body">Reply body</label>
                                            <textarea name="body" wire:model.defer="body" rows="5" cols="80"
                                                class="form-control" placeholder="Reply body"></textarea>
                                            @error('body') <span class="text-red-500 text-danger text-xs">{{ $message
                                                }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <h3 id="timer" class="text-danger text-center "></h3>
                                <div class="mt-1 mb-0">
                                    <button class="btn btn-primary btn-seconday " type="button"
                                        id="btn" wire:click="discard_reply()">Discard</button>

                                    <button class="btn btn-success float-right" type="submit" id="btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                    @endif
                    @foreach ($ticket->ticketReplies as $TicketReply)
                    <div class="row my-2">
                        <div class="col-6">
                            <h4 class="text-success pl-3"><b>{{ $TicketReply->user->name }}</b></h4>
                        </div>
                        <div class="col-6 float-right text-right">
                            <i><i class=" pr-3">{{ $TicketReply->created_at->diffForHumans() }}</i></i>
                        </div>
                        <div class="col-12">
                            @foreach ($TicketReply->files as $reply_image)
                                <img class=" my-1" width="100%" src="{{config("app.url"). $reply_image->path}}" alt="{{$reply_image->name }}" width="100%" />
                             @endforeach
                        </div>
                        <div class="col-12">
                            <pre class="p-3" style="font-family: sans-serif;font-size: 25px">{{ $TicketReply->body }}</pre>
                        </div>
                    </div>
                    <hr class="shadow">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
