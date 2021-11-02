<?php

namespace App\Http\Controllers;

use App\Models\fieldWorkDemo;
use Illuminate\Http\Request;
use App\Models\mobileworkdemo;
use App\Models\ourService;
use App\Models\testimonial;

class helperController extends Controller
{

    public function ourServices()
    {
        return view("ourServices",[
            "post" => ourService::where("status",1)->latest()->first()
        ]);
    }

    public function mobileWorkDemo()
    {
        return view("mobileWorkDemo",[
            "post" => mobileworkdemo::where("status",1)->latest()->first()
        ]);
    }

    public function testimonial()
    {
        return view("testimonials",[
            "post" => testimonial::where("status",1)->latest()->first()
        ]);
    }

    public function FormFlipWorkDemo()
    {
        return view("FormFieldWorkDemo",[
            "post" => fieldWorkDemo::where("status",1)->latest()->first()
        ]);
    }


    public function AdPostingDemo()
    {
        return view("AdPostingDemo");
    }


    public function SystemWork()
    {
        return view("SystemWork");
    }



}
