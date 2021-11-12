<main>
    <div class="container">
        <div class="row  mt-4 justify-content-around">
            <div class="col ">
                <h1 class=""><b>My Ticket</b></h1>
            </div>
            <div class="col float-right text-right ">
                <button wire:click="show_hide_ticket_form()" class="btn btn-primary" type="button"><b>Return To
                        Tickets</b></button>
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
                @if ($view_reply_ticket_form)
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-body">
                        <form wire:submit.prevent='ticket()'>
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Enter Ticket Subject</label>
                                        <input class="form-control @error(" subject") is-invalid @enderror" id="subject"
                                            type="text" name="subject" wire:model.defer="subject"
                                            placeholder="Enter ticket Subject" autofocus />
                                        @error("subject") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="custom-file mt-3">
                                        <label for="images" class="custom-file-label">Add
                                            ScreenShots/Images/photos</label>
                                        <input multiple class="custom-file-input @error(" images") is-invalid @enderror"
                                            id="images" type="file" name="images" wire:model="images"
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

                                    <div class="form-group mt-3">
                                        <label for="body">Ticket body</label>
                                        <textarea name="body" wire:model.defer="body" rows="7" cols="80"
                                            class="form-control" placeholder="Ticket body"></textarea>
                                        @error('body') <span class="text-red-500 text-danger text-xs">{{ $message
                                            }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <h3 id="timer" class="text-danger text-center "></h3>
                            <div class="mt-1 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit"
                                        id="btn">Submit</button></div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            <div class="col">
                <div class="col my-3">
                    <div>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {!! session('message') !!}
                        </div>
                        @endif
                    </div>
                    <div class="card shadow-lg border-0 rounded-lg mt-2">
                        <table class="table table-light ">
                            <div class="card-header bg-light">
                                <div class="row">
                                    <div class="col-4">
                                        <input class="form-control" wire:model='search' type="search" name="search"
                                            placeholder="Search ticket...">
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-light" type="button" wire:click="changeOrder()">{{ $order
                                            ==
                                            "DESC" ? "⏫ Sort":"⏬ Sort" }} </button>
                                    </div>
                                </div>
                            </div>
                            <thead class="card-header thead-white">
                                <th>#</th>
                                <th>Subject</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Status</th>
                            </thead>
                            <style>
                                #needHover:hover {
                                    background-color: lightblue;
                                }
                            </style>
                            <tbody>
                                {{-- @foreach ($tickets as $ticket)
                                <tr wire:click="view_this_ticket({{ $ticket->id }})" class="cursor-pointer"
                                    style="cursor: pointer;" id="needHover">
                                    <td>{{ $loop->index }}</td>
                                    <td>{{ $ticket->subject }}</td>
                                    <td>{{ $ticket->created_at->format("d /M /Y h:m") }}</td>
                                    <td> {{ $ticket->updated_at }} </td>
                                    <td>{{ $ticket->status->name }}</td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</main>
