<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\post;
class CreatePost extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap'; //uncomment this line if you want to use bootstrap pagination theme

    public function delete($id)
    {
        $post = post::findOrFail($id);
        unlink("storage/".$post->image);
        $post->delete();
        session()->flash('message', 'Post Deleted Successfully.');

}
    public function render()
    {
        return view('livewire.admin.create-post',[
            'posts' => post::latest()->paginate(20)
        ])->layout('admin.layouts.livewire');
    }
}
