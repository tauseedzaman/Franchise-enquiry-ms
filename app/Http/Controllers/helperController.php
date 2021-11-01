<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mobileworkdemo;
use App\Models\ourService;

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
        return view("testimonials");
    }

    public function FormFlipWorkDemo()
    {
        return view("FormFlipWorkDemo");
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
