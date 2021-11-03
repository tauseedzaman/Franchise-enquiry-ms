<?php

namespace App\Http\Controllers;

use App\Models\AdPostingDemo;
use App\Models\fieldWorkDemo;
use Illuminate\Http\Request;
use App\Models\mobileworkdemo;
use App\Models\ourService;
use App\Models\systemWork;
use App\Models\testimonial;
use App\Models\whayJoin;

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
        return view("AdPostingDemo",[
            "post" => AdPostingDemo::where("status",1)->latest()->first()
        ]);
    }

    public function whayJoin()
    {
        return view("whayJoin",[
            "post" => whayJoin::where("status",1)->latest()->first()
        ]);
    }

    public function SystemWork()
    {
        return view("SystemWork",[
            "post" => systemWork::where("status",1)->latest()->first()
        ]);
    }

    public function BusinessPlans()
    {
        return view("BusinessPlans",[
            // "post" => systemWork::where("status",1)->latest()->first()
        ]);
    }



}
