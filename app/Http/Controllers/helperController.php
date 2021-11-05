<?php

namespace App\Http\Controllers;

use App\Models\AdPostingDemo;
use App\Models\businessPlan;
use App\Models\classifiedSite;
use App\Models\fieldWorkDemo;
use Illuminate\Http\Request;
use App\Models\mobileworkdemo;
use App\Models\ourService;
use App\Models\systemWork;
use App\Models\testimonial;
use App\Models\uploads;
use App\Models\whayJoin;
use Illuminate\Support\Facades\Redirect;

class helperController extends Controller
{

    public function welcome()
    {
        if(auth()->user()){
            return Redirect()->route("home");
        }
        return view('welcome');
    }

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
            "posts" => uploads::where("page","BusinessPlan")->latest()->get()
        ]);
    }

    public function Downloads()
    {
        return view("downloads",[
            "posts" => uploads::where("page","downloads")->latest()->get()
        ]);
    }

    public function classifiedSite()
    {
        return view("classifiedSites",[
            "sites" => classifiedSite::latest()->get()
        ]);
    }


}
