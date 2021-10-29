<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\post;
class BlogPostsByCategory extends Component
{
    use WithPagination;

    public $cid;
    public function mount($cid)
    {
        $this->cid = $cid;
    }

    public function render()
    {
        return view('livewire.blog.blog-posts-by-category',[
            "posts" => post::where("category_id",$this->cid)->latest()->paginate(20)
        ])->layout("layouts.livewire");
    }
}
