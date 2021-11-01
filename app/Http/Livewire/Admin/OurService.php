<?php

namespace App\Http\Livewire\Admin;

use App\Models\ourService as ModelsOurService;
use Livewire\Component;
use Livewire\WithPagination;

class OurService extends Component
{

    use WithPagination;
    // protected $paginationTheme = 'bootstrap';


    public function delete($id)
    {
        ModelsOurService::findOrFail($id)->delete();
        session()->flash('message', 'Deleted Successfully.');
    }

    public function render()
    {
        return view('livewire.admin.our-service',[
            'posts' => ModelsOurService::latest()->paginate(20)
        ])->layout('admin.layouts.livewire');;
    }
}
