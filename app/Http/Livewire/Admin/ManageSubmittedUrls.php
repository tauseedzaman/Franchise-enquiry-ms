<?php

namespace App\Http\Livewire\Admin;

use App\Models\url;
use Livewire\Component;

class ManageSubmittedUrls extends Component
{

    public function approve($id)
    {
        $url = url::find($id);
        $url->status = "Approved";
        $url->save();
    }

    public function reject($id)
    {
        $url = url::find($id);
        $url->status = "Rejected";
        $url->save();
    }
    public function render()
    {
        if (auth()->user()->is_admin) {
            return view('livewire.admin.manage-submitted-urls',[
                "urls" => url::where("status","Pending")->latest()->paginate(100)
            ])->layout("admin.layouts.livewire");
        }else{
            return view('livewire.admin.manage-submitted-urls',[
                "urls" => url::where("status","Pending")->latest()->paginate(100)
            ])->layout("employee.layouts.livewire");
        }
    }
}
