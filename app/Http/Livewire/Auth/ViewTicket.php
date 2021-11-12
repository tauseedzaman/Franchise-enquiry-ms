<?php

namespace App\Http\Livewire\Auth;

use App\Models\File;
use App\Models\Ticket;
use App\Models\TicketReply;
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class ViewTicket extends Component
{

    use WithFileUploads;
    public $uuid;
    public $show_reply_form=false;
    public $images =[];
    public $body,$cid;

    public function discard_reply()
    {
        $this->show_reply_form=false;
        unset($this->body);
        unset($this->images);
    }
    public function save_ticket_reply()
    {
        $this->validate([
            'body' => "required|string",
        ]);
        if($this->images){
            $this->validate([
                "images.*" => "required|image|mimes:png,jpg,jpeg"
            ]);
        }
        $ticketReply = new TicketReply();
        $ticketReply->ticket_id = $this->cid;
        $ticketReply->user_id = auth()->id();
        $ticketReply->body = $this->body;
        $ticketReply->save();

        if ($this->images) {
            foreach($this->images as $image)
            {
                $Path = 'tickets/'.date('Y').'/'.date('m');
                $server_name = md5($image->getRealPath()).".".$image->getClientOriginalExtension();
                $filePath = "storage/".$Path."/".$server_name;
                $disk = "public";
                $image->storeAs($Path, $server_name, $disk);
                File::create([
                    'uuid' => Str::uuid(),
                    'name' => $image->getClientOriginalName(),
                    'server_name' =>  $server_name,
                    "extension" => $image->getClientOriginalExtension(),
                    "disk" => $disk,
                    "path" => $filePath,
                    'ticket_reply_id' =>  $ticketReply->id,
                    "user_id" => auth()->id()
                ]);

            }
            unset($this->images);

        }
        unset($this->body);
        $this->show_reply_form=false;
}


    public function show_reply_form()
    {
        $this->show_reply_form=true;
    }
    public function mount($uuid)
    {
        $this->uuid = $uuid;
    }
    public function render()
    {
        $ticket =Ticket::where(["user_id" => auth()->id(),"uuid" => $this->uuid])->first();
        $this->cid = $ticket->id;
        return view('livewire.auth.view-ticket',[
            'ticket' => $ticket
        ])->layout("layouts.app-livewire");
    }
}
