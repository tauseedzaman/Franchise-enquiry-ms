<?php

namespace App\Http\Livewire;

use App\Models\url;
use Facade\FlareClient\Time\Time;
use Livewire\Component;

class SubmitUrl extends Component
{
    public $url;
    public $form_disabled = false;
    public $countDown = 120;

    public function save_url()
    {
        $this->validate([
            'url' => 'required|url',
        ]);

        $this->form_disabled = true;
        if(url::where("user_id",auth()->id())->where("url",$this->url)->count() > 0){
            return session()->flash('error', "You All Ready Have Added This URL. Please Choose another one");
        }
        if ((intval(url::where("user_id",auth()->id())->latest()->first()->on)+120) > Time() ) {
            return session()->flash('error', "Please Wait for 2 minutes");
        }
        $timer = Time();
        url::create([
            'url' => $this->url,
            'on' => Time(),
            'user_id' => auth()->id(),
        ]);

        $this->url = '';
        session()->flash('message', "<b>URL Submitted Successfully!</b><br /> Please Wait for two minutes for Submitting Another URL");
        $this->emit("save_url",$timer);
}

    public function render()
    {
        return view('livewire.submit-url')->layout("layouts.app-livewire");
    }
}
