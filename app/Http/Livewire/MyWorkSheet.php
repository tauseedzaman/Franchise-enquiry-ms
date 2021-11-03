<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MyWorkSheet extends Component
{
    public function render()
    {
        return view('livewire.my-work-sheet',[
            // "feedbacks" => feedbacks::latest()->paginate(20)
        ])->layout("layouts.livewire");
    }
}
