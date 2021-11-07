<?php

namespace App\Http\Livewire;

use App\Models\url;
use Livewire\Component;

class MyWorkSheet extends Component
{
    public function render()
    {
        return view('livewire.my-work-sheet',[
            "urls" => url::latest()->paginate(50)
        ])->layout("layouts.app-livewire");
    }
}
