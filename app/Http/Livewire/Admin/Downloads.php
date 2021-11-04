<?php

namespace App\Http\Livewire\Admin;

use App\Models\uploads;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
class Downloads extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $show_data=true;
    public $title;
    public $description;
    public $edit_post_id;
    public $file;

    public $btn_text = "Create Content";

    public function show_form()
    {
        $this->show_data=false;
    }

    public function save_content()
    {
        if ($this->edit_post_id) {
            $this->update($this->edit_post_id);
        }else{
            $this->validate([
                'title' => "required",
                "description" => "required|string",
                "file" => "required|file"
            ]);
            uploads::create([
                'title' => $this->title,
                "description" => $this->description,
                "file" => $this->file->store("Downloads","public"),
                "page" => "downloads"
            ]);
        session()->flash('message', 'Created Successfully.');

        unset($this->title);
        unset($this->description);
        unset($this->file);
        $this->show_data=true;
        }
    }

    public function update($id)
    {
        $this->validate([
            'title' => "required",
            "description" => "required|string",
        ]);

        $content = uploads::findOrFail($id);
        $content->title = $this->title;
        $content->description = $this->description;
        if ($this->file) {
            unlink("storage/".$content->file);
            $content->file = $this->file->store("businessPlan","public");
        }
        $content->save();

        unset($this->title);
        unset($this->description);
        unset($this->edit_post_id);
        unset($this->file);

        $this->show_data=true;

        session()->flash('message', 'Updated Successfully.');

        $this->btn_text = "Create Content";

}


    public function edit($id)
    {
        $record = uploads::findOrFail($id);
        $this->edit_post_id = $id;
        $this->title = $record->title;
        $this->description = $record->description;
        $this->btn_text="Update Content";
        $this->show_data=false;
    }

    public function delete($id)
    {
        $record = uploads::findOrFail($id);
        unlink("storage/".$record->file);
        $record->delete();
        session()->flash('message', 'Deleted Successfully.');
    }
    public function render()
    {
        return view('livewire.admin.downloads',[
            "posts" => uploads::where("page","downloads")->latest()->paginate(20)
        ])->layout("admin.layouts.livewire");
    }
}
