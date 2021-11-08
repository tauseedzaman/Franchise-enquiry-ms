<?php

namespace App\Http\Livewire\Admin;

use App\Models\uploads;
use Livewire\Component;

class DisableLoginRegister extends Component
{

    public $title;
    public $description;
    public $edit_message_id;
    public $show_data = true;

    public $btn_text = "Add New Message";

    public function save_disable()
    {
        if ($this->edit_message_id) {

            $this->update($this->edit_message_id);

        }else{
        $this->validate([
            'title' => "required",
            "description" => "required"
        ]);
        uploads::where("page","disableLoginRegister")->delete();
        uploads::create([
            'title' => $this->title,
            "description" => $this->description,
            "page" => "disableLoginRegister"
        ]);
        session()->flash('message', 'Created Successfully.');
        unset($this->title);
        unset($this->description);
        $this->show_data = true;
        }
    }

    public function show_from()
    {
            $this->show_data = false;
    }

    public function update($id)
    {
        $this->validate([
            'title' => "required",
            "description" => "required"
        ]);
        $post = uploads::findOrFail($id);
        $post->title = $this->title;
        $post->description = $this->description;
        $post->save();

        unset($this->title);
        unset($this->description);
        unset($this->edit_message_id);
        $this->show_data = true;


        session()->flash('message', 'Updated Successfully.');

        $this->btn_text = "Create";

}


    public function edit($id)
    {
        $post = uploads::findOrFail($id);
        $this->edit_post_id = $id;
        $this->title = $post->title;
        $this->description = $post->description;
        $this->show_data = false;
        $this->btn_text="Update";
    }

    public function delete($id)
    {
        uploads::findOrFail($id)->delete();
        session()->flash('message', 'Deleted Successfully.');
    }
    public function render()
    {
        return view('livewire.admin.disable-login-register',[
            "posts" => uploads::where("page","disableLoginRegister")->latest()->get()
        ])->layout("admin.layouts.livewire");
    }
}
