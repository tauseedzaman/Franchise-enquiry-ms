<?php

namespace App\Http\Livewire\Admin;

use App\Models\testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class Testimonials extends Component
{

    use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $post = testimonial::findOrFail($id);
        $post->delete();
        session()->flash('message', 'Deleted Successfully.');
}
    public function render()
    {
        return view('livewire.admin.testimonials',[
            'posts' => testimonial::latest()->paginate(20)
        ])->layout('admin.layouts.livewire');
    }
}
