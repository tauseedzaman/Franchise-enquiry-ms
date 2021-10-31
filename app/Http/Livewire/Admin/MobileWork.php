<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\mobileworkdemo;
class MobileWork extends Component
{

    use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $post = mobileworkdemo::findOrFail($id);
        $post->delete();
        session()->flash('message', 'Deleted Successfully.');
}
    public function render()
    {
        return view('livewire.admin.mobile-work',[
            'posts' => mobileworkdemo::latest()->paginate(20)
        ])->layout('admin.layouts.livewire');
    }
}
