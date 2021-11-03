<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubmitUrl extends Component
{
    public function render()
    {
        return view('livewire.submit-url')->layout("layouts.livewire");
    }
}
