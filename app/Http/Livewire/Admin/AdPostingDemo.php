<?php

namespace App\Http\Livewire\Admin;

use App\Models\AdPostingDemo as ModelsAdPostingDemo;
use Livewire\Component;
use Livewire\WithPagination;

class AdPostingDemo extends Component
{

    use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $post = ModelsAdPostingDemo::findOrFail($id)->delete();
        session()->flash('message', 'Deleted Successfully.');
}
    public function render()
    {
        return view('livewire.admin.ad-posting-demo',[
            'posts' => ModelsAdPostingDemo::latest()->paginate(20)
        ])->layout('admin.layouts.livewire');

    }
}
