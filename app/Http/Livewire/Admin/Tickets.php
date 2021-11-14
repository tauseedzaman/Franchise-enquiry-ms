<?php

namespace App\Http\Livewire\Admin;

use App\Models\agents;
use App\Models\File;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Str;

class Tickets extends Component
{

    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $search='';
    public $order='DESC';
    public $create_ticket=false;

    public $subject;
    public $images=[];
    public $body;
    public $checkedElements =[];
    public $show_ticket_menu=false;
    public $agent;

    public function add_agent_to_ticket()
    {
        if ($this->agent) {
            $tickets = Ticket::find($this->checkedElements);
            foreach ($tickets as $ticket) {
                $ticket->agent_id = $this->agent;
                $ticket->save();
            }
            session()->flash('message', 'Ticket Assigned Successfully');
        }
        $this->show_ticket_menu = false;
    }


    public function checkedElements($id)
    {
        $this->show_ticket_menu=true;
        $this->checkedElements[]=$id;
    }

    public function delete_ticket()
    {
        $items = Ticket::find($this->checkedElements);
        foreach($items as $item) {
            $item->delete();
        }
        unset($this->checkedElements);
        session()->flash('message', 'Deleted Successfully.');
    }

    public $view_this_ticket = null;

    public function ticket()
    {
        $this->validate([
            'subject' => "required",
            'body' => "required",
        ]);
        if($this->images){
            $this->validate([
                "images.*" => "required|image|mimes:png,jpg,jpeg"
            ]);
        }
        $ticketUUID =  Str::uuid();
        $ticket = new Ticket();
        $ticket->uuid = $ticketUUID;
        $ticket->subject = $this->subject;
        $ticket->status_id = 1;
        $ticket->user_id = auth()->id();
        $ticket->saveOrFail();



        $ticketReply = new TicketReply();
        $ticketReply->ticket_id = $ticket->id ;
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
        unset($this->subject);
        unset($this->body);
        $this->create_ticket=false;
        session()->flash('message', 'Ticket Created Successfully.');
        // $ticket->user->notify((new NewTicketFromAgent($ticket)));

}



    public function view_this_ticket($ticketId)
    {
        $this->view_this_ticket=$ticketId;
    }


    public function changeOrder()
    {
        if ($this->order=="DESC") {
            $this->order="ASC";
        }else{
            $this->order="DESC";
        }
    }


    public function show_create_ticket_form()
    {
        $this->create_ticket=true;
    }

    public function show_hide_ticket_form()
    {
        $this->create_ticket=false;
    }


    public function close_ticket()
    {
        $tickets = Ticket::find($this->checkedElements);
        foreach($tickets as $ticket){
            $ticket->status_id=1;
            $ticket->save();
        }
        session()->flash('message', 'Tickets Closed Successfully.');
    }


    public function render()
    {
        $agents = agents::where("role_id",3)->with("user")->get("user_id",'name');
        if (auth()->user()->is_admin) {
            return view('livewire.admin.tickets',[
                "agents" => $agents,
                'tickets' => Ticket::where("subject",'LIKE','%'.$this->search."%")->orderBy('id',$this->order)->paginate(40)
            ])->layout("admin.layouts.livewire");
        }else{
            return view('livewire.admin.tickets',[
                'tickets' => Ticket::where("subject",'LIKE','%'.$this->search."%")->orderBy('id',$this->order)->paginate(40),
                "agents" => $agents
            ])->layout("employee.layouts.livewire");
        }
    }
}
