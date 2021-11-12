<?php

namespace App\Http\Livewire\Admin;

use App\Models\agents as ModelsAgents;
use App\Models\category;
use App\Models\role;
use App\Models\User;
use Livewire\Component;

class Agents extends Component
{
    public $user;
    public $role;
    public $edit_agent_id;
    public $show_data = true;

    public $btn_text = "Add Employee";

    public function save_agent()
    {
        if ($this->edit_agent_id) {

            $this->update($this->edit_agent_id);

        }else{
        $this->validate([
            'user' => "required",
            "role" => "required"
        ]);
        if (ModelsAgents::where(['user_id' => $this->user,'role_id' => $this->role])->count() > 0)
        {
         return session()->flash('message', 'This User already has this role.');
        }
        $agent = ModelsAgents::create([
            "user_id" => $this->user,
            'role_id' => $this->role,
        ]);
        if (ModelsAgents::where("user_id",$agent->user_id)->count() == 1) {
            $user = User::find($agent->user->id);
            $user->is_agent=true;
            $user->save();
        }

        session()->flash('message', 'Created Successfull.');
        unset($this->user);
        unset($this->role);
        $this->show_data = true;
        }
    }

    public function show_from()
    {
            $this->show_data = false;
    }

    public function hide_form()
    {
        $this->show_data = true;
    }

    public function update($id)
    {
        $this->validate([
            'user' => "required",
            "role" => "required"
        ]);
        if (ModelsAgents::where(['user_id' => $this->user,'role_id' => $this->role])->count() > 0)
        {
         return session()->flash('message', 'This User already has this role.try new one');
        }
        $role = ModelsAgents::findOrFail($id);
        $role->user_id = $this->user;
        $role->role_id = $this->role;
        $role->save();

        unset($this->user);
        unset($this->role);
        unset($this->edit_agent_id);
        $this->show_data = true;


        session()->flash('message', 'Updated Successfully.');

        $this->btn_text = "Add Employee";

}


    public function edit($id)
    {
        $role = ModelsAgents::findOrFail($id);
        $this->edit_agent_id = $id;
        $this->user = $role->user_id;
        $this->role = $role->role_id;
        $this->show_data = false;
        $this->btn_text="Update Employee";
    }

    public function delete($id)
    {
        $agent = ModelsAgents::findOrFail($id);
        if (ModelsAgents::where("user_id",$agent->user_id)->count() == 1) {
            $user = User::find($agent->user->id);
            $user->is_agent=false;
            $user->save();
        }
        $agent->delete();
        session()->flash('message', ' Deleted Successfully.');
    }

    public function render()
    {
        return view('livewire.admin.agents',[
            "roles" => role::all(),
            "users" => User::latest()->get(['id','name','email']),
            "agents" => ModelsAgents::latest()->get(),
        ])->layout("admin.layouts.livewire");
    }
}
