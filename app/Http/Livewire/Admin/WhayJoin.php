<?php

namespace App\Http\Livewire\Admin;

use App\Models\whayJoin as ModelsWhayJoin;
use Livewire\Component;
use Livewire\WithPagination;

class WhayJoin extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $post = ModelsWhayJoin::findOrFail($id)->delete();
        session()->flash('message', 'Deleted Successfully.');
}
    public function render()
    {
        return view('livewire.admin.whay-join',[
            'posts' => ModelsWhayJoin::latest()->paginate(20)
        ])->layout('admin.layouts.livewire');

    }
}
