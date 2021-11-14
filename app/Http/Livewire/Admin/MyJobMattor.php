<?php

namespace App\Http\Livewire\Admin;

use App\Models\File;
use App\Models\MyJobMattor as ModelsMyJobMattor;
use Hamcrest\Core\HasToString;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Str;

class MyJobMattor extends Component
{
    use WithPagination;
    use WithFileUploads;


    public $search='';
    public $order = 'DESC';

    public $create_jobMattor = false;
    public $view_this_job_mattor = false;
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


    public $this_post;

    public function return_back_to_list()
    {
        $this->create_jobMattor = false;
        $this->view_this_job_mattor = false;
    }

    public function view_post($id)
    {
        $this->this_post = ModelsMyJobMattor::find($id)->latest()->first();
        $this->view_this_job_mattor = true;

    }

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
            "video" => "required",
        ]);

        if($this->images){
            $this->validate([
                "images.*" => "required|image|mimes:png,jpg,jpeg"
            ]);
        }
        $jobMattor = ModelsMyJobMattor::create([
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'subcategory' => $this->subcategory,
            'location' => $this->location,
            'website' => $this->website,
            'email' => $this->email,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'price' => $this->price,
        ]);
        $Path = 'tickets/'.date('Y').'/'.date('m');
        $disk = "public";
        $server_name = md5($this->video->getRealPath()).".".$this->video->getClientOriginalExtension();
        $filePath = "storage/".$Path."/".$server_name;
        $this->video->storeAs($Path, $server_name, $disk);
            File::create([
                    'uuid' => Str::uuid(),
                    'name' => $this->video->getClientOriginalName(),
                    'server_name' =>  $server_name,
                    "extension" => $this->video->getClientOriginalExtension(),
                    "disk" => $disk,
                    "path" => $filePath,
                    'my_job_mattor_id' =>  $jobMattor->id,
                    "user_id" => auth()->id()
                ]);

                if ($this->images) {
            foreach($this->images as $image)
            {
                $server_name = md5($image->getRealPath()).".".$image->getClientOriginalExtension();
                $filePath = "storage/".$Path."/".$server_name;
                $image->storeAs($Path, $server_name, $disk);
                File::create([
                    'uuid' => Str::uuid(),
                    'name' => $image->getClientOriginalName(),
                    'server_name' =>  $server_name,
                    "extension" => $image->getClientOriginalExtension(),
                    "disk" => $disk,
                    "path" => $filePath,
                    'my_job_mattor_id' =>  $jobMattor->id,
                    "user_id" => auth()->id()
                ]);

            }
            unset($this->images);

        }
        unset($this->title);
        unset($this->description);
        unset($this->category);
        unset($this->subcategory);
        unset($this->location);
        unset($this->website);
        unset($this->email);
        unset($this->phone);
        unset($this->whatsapp);
        unset($this->price);
        unset($this->video);
        $this->create_jobMattor=false;
        session()->flash('message', 'My Job Mattor Created Successfully.');

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
