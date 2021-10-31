<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mobileworkdemo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use  Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
class mobileWorkController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.MobileWorkDemo.create');
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

                mobileworkdemo::create([
                    'title'         => $request->title,
                    'content'         => $request->content,
                    'status'         => $request->status,
                    'description'     => $request->description,
                ]);
                return redirect(route("admin.mobile.work"));
    }

    public function uploadImage(Request $request) {
        if($request->hasFile('upload')) {
                   $originName = $request->file('upload')->getClientOriginalName();
                   $fileName = pathinfo($originName, PATHINFO_FILENAME);
                   $extension = $request->file('upload')->getClientOriginalExtension();
                   $fileName = $fileName.'_'.time().'.'.$extension;

                   $request->file('upload')->move(public_path('images'), $fileName);

                   $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                   $url = asset('images/'.$fileName);
                   $msg = 'Image uploaded successfully';
                   $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

                   @header('Content-type: text/html; charset=utf-8');
                   echo $response;
               }
           }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('admin.mobileworkDemo.edit',[
           'post' => mobileworkdemo::findOrFail($id)
           ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            ]);
            if($request->file('image')){
                $request->validate([
                    'image' => 'required|mimes:png,jpg,jpeg,ico,svg|max:2048',
                ]);
            }else{

            }
                $post = mobileworkdemo::find($id);

                $post->title = $request->title;
                $post->content = $request->content;
                $post->status = $request->status;
                $post->description = $request->description;
                $post->save();
                return redirect(route("admin.mobile.work"));
    }

}
