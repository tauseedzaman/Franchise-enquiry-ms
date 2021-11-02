<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdPostingDemo;
use Illuminate\Http\Request;

class AdPostingDemoController extends Controller
{
       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adPosting.demo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'description' => 'required',
            ]);
                AdPostingDemo::create([
                    'title'         => $request->title,
                    'content'         => $request->content,
                    'status'         => $request->status,
                    'description'     => $request->description,
                ]);
                return redirect(route("admin.AdPostingDemo"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.adPosting,demo.edit',[
            'post' => AdPostingDemo::findOrFail($id)
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
            'content' => 'required',
            ]);
                $post = AdPostingDemo::find($id);

                $post->title = $request->title;
                $post->content = $request->content;
                $post->status = $request->status;
                $post->description = $request->description;
                $post->save();
                return redirect(route("admin.AdPostingDemo"));

    }
}
