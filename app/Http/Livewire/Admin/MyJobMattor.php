<?php

namespace App\Http\Livewire\Admin;

use App\Models\MyJobMattor as ModelsMyJobMattor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MyJobMattor extends Component
{
    use WithPagination;
    use WithFileUploads;


    public $search='';
    public $order = 'DESC';

    public $create_jobMattor = false;
    public $title;
    public $description;
    public $category;
    public $subcategory;
    public $location;
    public $website;
    public $email;
    public $phone;
    public $whatsapp;
    public $price;
    public $images;
    public $video;


    public function save_jobMattor()
    {
        $this->validate([
            'title' => "required|max:255",
            'description' => "required",
            'category' => "required",
            'subcategory' => "required",
            'location' => "required",
            'website' => "required|url",
            'email' => "required|email",
            'phone' => "required",
            'whatsapp' => "required|url",
            'price' => "required",
            "images" => "required",
            "video" => "required|url"
        ]);
        if($this->images){
            $this->validate([
                "images.*" => "required|image|mimes:png,jpg,jpeg"
            ]);
        }
        dd("good to do");
    }

    public function changeOrder()
    {
        if ($this->order=="DESC") {
            $this->order="ASC";
        }else{
            $this->order="DESC";
        }
    }


    public function show_create_jobMattor_form()
    {
        $this->create_jobMattor = true;
    }


    public function render()
    {
        if (auth()->user()->is_admin) {
            return view('livewire.admin.my-job-mattor',[
                'posts' => ModelsMyJobMattor::where("title",'LIKE','%'.$this->search."%")->orWhere("description",'LIKE','%'.$this->search."%")->orderBy('id',$this->order)->paginate(40),
                ])->layout("admin.layouts.livewire");
            }else{
                return view('livewire.admin.my-job-mattor',[
                    'posts' => ModelsMyJobMattor::where("title",'LIKE','%'.$this->search."%")->orWhere("description",'LIKE','%'.$this->search."%")->orderBy('id',$this->order)->paginate(40),
                    ])->layout("employee.layouts.livewire");
            }
    }
}
