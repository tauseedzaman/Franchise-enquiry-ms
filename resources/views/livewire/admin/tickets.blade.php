<main>
    @if (!$create_ticket)
    <div class="container">
        <div class="row  mt-4 justify-content-around">
            <div class="col-12">
                <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info"><b>Tickets</b></h1>
            </div>
            <div class="col-12 float-right ">
                        <button wire:click="show_create_ticket_form()" class="btn btn-primary ml-auto" type="button"><b>New
                        Ticket</b></button>
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
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <table class="table table-light ">
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-4">
                                    <input class="form-control" wire:model='search' type="search" name="search"
                                        placeholder="Search ticket...">
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-light" type="button" wire:click="changeOrder()">{{ $order ==
                                        "DESC" ? "⏫ Sort":"⏬ Sort" }} </button>
                                </div>
                            </div>
                        </div>

                        @if ($show_ticket_menu)
                        <div class="card-header bg-light">
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-danger" type="button" wire:click="delete_ticket()">Delete</button>
                                    <button class="btn btn-warning" type="button" wire:click="close_ticket()">Close Ticket</button>
                                        <select id="my-select" class="form-inline p-1 px-2 rounded shadow" wire:model="agent" name="agent" wire:change="add_agent_to_ticket()">
                                            <option>Assign to</option>
                                            @foreach ($agents as $agent)
                                              <option value="{{ $agent->user_id }}">{{ $agent->user->name }}</option>
                                            @endforeach

                                        </select>
                                </div>
                            </div>
                        </div>
                        @endif
                        <thead class="card-header thead-white">
                            <th>
                                #
                                {{-- <input type="checkbox" onchange="checkElements()" wire:change="checkedAllElements()" name="checkedAllElements" id="checkedAllElements" class="form-check-input"> --}}
                            </th>
                            <th>Customer</th>
                            <th>Ticket Summary</th>
                            <th>Agent</th>
                            <th>Status</th>
                            <th>Updated at</th>
                        </thead>
                        <style>
                            #needHover:hover {
                                background-color: lightblue;
                            }
                        </style>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr  class="cursor-pointer" style="cursor: pointer;" id="needHover">
                                <td>
                                        <input type="checkbox" name="checkedElements" wire:change='checkedElements({{ $ticket->id }})' id="checkedElements" class="form-check-input">

                                    </td>
                                    <td><a class="nav-link text-dark" href="{{ route("admin.ViewTicket",$ticket->uuid) }}">
                                        {{ $ticket->user->name }}
                                        <p class="p-0 m-0" style="color:rgb(160, 154, 155)">{{ $ticket->user->email }}</p>
                                    </a></td>

                                    <td><a class="nav-link text-dark" href="{{ route("admin.ViewTicket",$ticket->uuid) }}">
                                            <b>{{ $ticket->subject }}</b>
                                            <p class="p-0 m-0" style="color:rgb(160, 154, 155)">{{ $ticket->ticketReplies->first()->body }}</p>

                                    </a></td>
                                    <td><a class="nav-link text-dark" href="{{ route("admin.ViewTicket",$ticket->uuid) }}">{{ $ticket->agent ? $ticket->agent->name:"Unassigned"  }}</a></td>
                                    <td><a class="nav-link text-dark" href="{{ route("admin.ViewTicket",$ticket->uuid) }}">{{ $ticket->status->name }}</a></td>
                                    <td><a class="nav-link text-dark" href="{{ route("admin.ViewTicket",$ticket->uuid) }}"> {{ $ticket->updated_at->diffForHumans() }} </a></td>
                                </tr>
                            </a>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-12 mx-auto ">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row  mt-4 justify-content-around">
            <div class="col ">
                <h1 class=""><b>Create Ticket</b></h1>
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
            </div>
        </div>
    </div>
    @endif
                                <script>
                                    function checkElements(){
                                       let elements = document.querySelectorAll("#checkedElements");
                                       let check = document.querySelector("#checkedAllElements");
                                       if (check.checked == true) {
                                        elements.forEach(element => {
                                           element.checked = true;
                                       });
                                       }else{
                                       elements.forEach(element => {
                                           element.checked = false;
                                       });
                                    }
                                    }
                                </script>
</main>
