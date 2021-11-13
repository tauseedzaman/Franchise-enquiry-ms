<?php

namespace App\Http\Livewire\Admin;

use App\Models\agents;
use App\Models\classifiedSite as ModelsClassifiedSite;
use Livewire\Component;
use Livewire\WithPagination;

class ClassifiedSite extends Component
{
    use WithPagination;

    public $name;
    public $link;
    public $edit_site_id;
    public $show_data = true;

    public $btn_text = "Create Classified Site";

    public function save_site()
    {
        if ($this->edit_site_id) {

            $this->update($this->edit_site_id);
        } else {
            $this->validate([
                'name' => "required",
                "link" => "required|url"
            ]);
            ModelsClassifiedSite::create([
                'name' => $this->name,
                "link" => $this->link,
            ]);
            session()->flash('message', 'Classified-Site Created Successfully.');
            unset($this->name);
            unset($this->link);
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
            'name' => "required",
            "link" => "required|url"
        ]);
        $site = ModelsClassifiedSite::findOrFail($id);
        $site->name = $this->name;
        $site->link = $this->link;
        $site->save();

        unset($this->name);
        unset($this->link);
        unset($this->edit_site_id);
        $this->show_data = true;


        session()->flash('message', 'Classified-Site Updated Successfully.');

        $this->btn_text = "Create Category";
    }


    public function edit($id)
    {
        $site = ModelsClassifiedSite::findOrFail($id);
        $this->edit_site_id = $id;
        $this->name = $site->name;
        $this->link = $site->link;
        $this->show_data = false;
        $this->btn_text = "Update Classified-Site";
    }

    public function delete($id)
    {
        ModelsClassifiedSite::findOrFail($id)->delete();
        session()->flash('message', 'Classified-Site Deleted Successfully.');
    }
    public function render()
    {
        if (auth()->user()->is_admin) {
            return view('livewire.admin.classified-site', [
                "sites" => ModelsClassifiedSite::latest()->paginate(100)
            ])->layout("admin.layouts.livewire");
        } else {
            return view('livewire.admin.classified-site', [
                "sites" => ModelsClassifiedSite::latest()->paginate(100)
            ])->layout("employee.layouts.livewire");
        }
    }
}
