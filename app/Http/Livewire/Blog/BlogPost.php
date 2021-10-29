<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\post;
use App\Models\comment;

class BlogPost extends Component
{
    public $p_id;
    public $comment;

    public function mount($p_id)
    {
        $this->p_id = $p_id;
    }

    public function save_comment()
    {
        $this->validate(['comment' => "required"]);
        comment::create([
            "post_id" => $this->p_id,
            "user_id" => auth()->id(),
            "content" => $this->comment,
        ]);
        unset($this->comment);
    }
    public function render()
    {
        return view('livewire.blog.blog-post',[
            "post" => post::findOrFail($this->p_id)->first(),
            "comments" => comment::where("post_id",$this->p_id)->latest()->get()
        ])->layout("layouts.livewire");
    }
}
