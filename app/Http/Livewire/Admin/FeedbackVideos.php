<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\feedbacks;
use Livewire\WithPagination;

class FeedbackVideos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $title;
    public $user;
    public $video;
    public $edit_feedback_id;

    public $btn_text = "Create feedback";

    public function save_feedback()
    {
        if ($this->edit_feedback_id) {

            $this->update($this->edit_feedback_id);

        }else{
        $this->validate([
            'title' => "required",
            "user" => "required|string",
            "video" => "required"
        ]);
        feedbacks::create([
            'title' => $this->title,
            "user" => $this->user,
            "video" => $this->video
        ]);
        session()->flash('message', 'Feedback Created Successfully.');
        unset($this->title);
        unset($this->user);
        unset($this->video);
        }
    }

    public function update($id)
    {
        $this->validate([
            'title' => "required",
            "user" => "required|string",
            "video" => "required"
        ]);
        $feedback = feedbacks::findOrFail($id);
        $feedback->title = $this->title;
        $feedback->user = $this->user;
        $feedback->video = $this->video;
        $feedback->save();

        unset($this->title);
        unset($this->user);
        unset($this->video);
        unset($this->edit_feedback_id);

        session()->flash('message', 'Feedback Updated Successfully.');

        $this->btn_text = "Create Feedback";

}


    public function edit($id)
    {
        $feedback = feedbacks::findOrFail($id);
        $this->edit_feedback_id = $id;
        $this->title = $feedback->title;
        $this->user = $feedback->user;
        $this->video = $feedback->video;

        $this->btn_text="Update Feedback";
    }

    public function delete($id)
    {
        feedbacks::findOrFail($id)->delete();
        session()->flash('message', 'Feedback Deleted Successfully.');
    }


    public function render()
    {
        return view('livewire.admin.feedback-videos',[
            "feedbacks" => feedbacks::latest()->paginate(20)
        ])->layout("admin.layouts.livewire");
    }
}
