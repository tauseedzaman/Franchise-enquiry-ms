<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;

class BlogPost extends Component
{
    public function render()
    {
        return view('livewire.blog.blog-post')->layout("layouts.livewire");
    }
}
