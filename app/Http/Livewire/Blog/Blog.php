<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\post;
class Blog extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.blog.blog',[
            'posts' => post::latest()->paginate(20)
        ])->layout("layouts.livewire");
    }
}
