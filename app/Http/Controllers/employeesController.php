<?php

namespace App\Http\Controllers;

use App\Models\agents;
use Illuminate\Http\Request;

class employeesController extends Controller
{
    public function index()
    {
        return view("employee.dashboard",[
            "agents" => agents::all()
        ]);
    }
}
