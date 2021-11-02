<?php

namespace App\Http\Livewire\Admin;

use App\Models\systemWork as ModelsSystemWork;
use Livewire\Component;
use Livewire\WithPagination;

class SystemWork extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';


    public function delete($id)
    {
        ModelsSystemWork::findOrFail($id)->delete();
        session()->flash('message', 'Deleted Successfully.');
    }

    public function render()
    {
        return view('livewire.admin.system-work',[
            'posts' => ModelsSystemWork::latest()->paginate(20)
        ])->layout('admin.layouts.livewire');;
    }
}
