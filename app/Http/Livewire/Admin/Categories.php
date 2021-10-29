<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\category;
class Categories extends Component
{

    public $title;
    public $description;
    public $edit_category_id;

    public $btn_text = "Create Category";

    public function save_category()
    {
        if ($this->edit_category_id) {

            $this->update($this->edit_category_id);

        }else{
        $this->validate([
            'title' => "required",
            "description" => "required|string"
        ]);
        category::create([
            'title' => $this->title,
            "description" => $this->description,
            "user_id" => auth()->id()
        ]);
        session()->flash('message', 'Category Created Successfully.');
        unset($this->title);
        unset($this->description);
        }
    }

    public function update($id)
    {
        $this->validate([
            'title' => "required",
            "description" => "required|string"
        ]);
        $category = category::findOrFail($id);
        $category->title = $this->title;
        $category->description = $this->description;
        $category->save();

        unset($this->title);
        unset($this->description);
        unset($this->edit_category_id);

        session()->flash('message', 'Category Updated Successfully.');

        $this->btn_text = "Create Category";

}


    public function edit($id)
    {
        $category = category::findOrFail($id);
        $this->edit_category_id = $id;
        $this->title = $category->title;
        $this->description = $category->description;

        $this->btn_text="Update Category";
    }

    public function delete($id)
    {
        category::findOrFail($id)->delete();
        session()->flash('message', 'Category Deleted Successfully.');
    }
    public function render()
    {
        return view('livewire.admin.categories',[
            "categories" => category::latest()->get()
        ])->layout("admin.layouts.livewire");
    }
}
