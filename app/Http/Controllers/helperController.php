<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class helperController extends Controller
{
    public function FeedbackVideo()
    {
        return view("FeedbackVideo");
    }

    public function ourServices()
    {
        return view("ourServices");
    }

    public function mobileWorkDemo()
    {
        return view("mobileWorkDemo");
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
