<?php

namespace App\Http\Livewire;

use App\Models\url;
use Livewire\Component;

class MyWorkSheet extends Component
{
    public function render()
    {
        return view('livewire.my-work-sheet',[
            "urls" => url::where("user_id",auth()->id())->latest()->paginate(50)
        ])->layout("layouts.app-livewire");
    }
}
