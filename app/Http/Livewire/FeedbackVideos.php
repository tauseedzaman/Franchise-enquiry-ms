<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\feedbacks;
use Livewire\WithPagination;
class FeedbackVideos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.feedback-videos',[
            "feedbacks" => feedbacks::latest()->paginate(20)
        ])->layout("layouts.livewire");
    }
}
