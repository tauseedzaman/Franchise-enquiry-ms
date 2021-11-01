<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\comment as Modelcomments;
use App\Models\post;

class Comments extends Component
{
    public $postId=1;

    public function delete($id)
    {
        Modelcomments::findOrFail($id)->delete();
        session()->flash('message', ' Deleted Successfully.');
    }

    public function render()
    {
        return view('livewire.admin.comments',[
            'comments' => Modelcomments::where("post_id",$this->postId)->get(),
            'posts' => post::latest()->get(["id","title"]),
        ])->layout('admin.layouts.livewire');
    }
}
