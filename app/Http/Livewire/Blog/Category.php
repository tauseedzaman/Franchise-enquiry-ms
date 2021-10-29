<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\category as categoryModel;
class Category extends Component
{
    public function render()
    {
        return view('livewire.blog.category',[
            "categories" => categoryModel::all()
        ]);
    }
}
