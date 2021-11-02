<?php

namespace App\Http\Livewire\Admin;

use App\Models\fieldWorkDemo as ModelsFieldWorkDemo;
use Livewire\WithPagination;

use Livewire\Component;

class FieldWorkDemo extends Component
{

    use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $post = ModelsFieldWorkDemo::findOrFail($id);
        $post->delete();
        session()->flash('message', 'Deleted Successfully.');
}
    public function render()
    {
        return view('livewire.admin.field-work-demo',[
            'posts' => ModelsFieldWorkDemo::latest()->paginate(20)
        ])->layout('admin.layouts.livewire');
    }
}
