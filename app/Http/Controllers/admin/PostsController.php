<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use  Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = post::all();
        return view('admin.posts.posts',['posts' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categries = category::all();
        return view('admin.posts.create',['categories' => $categries]);
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
            'image' => 'required|mimes:png,jpg,jpeg,ico,svg|max:2048',
            'category' => 'required',
            'content' => 'required',
            'description' => 'required',
            ]);

            if($path = $request->file('image')->store('posts', 'public')){
                post::create([
                    'title'         => $request->title,
                    'image'         => $path,
                    'content'         => $request->content,
                    'category_id'         => $request->category,
                    'user_id'         => auth()->id(),
                    'description'     => $request->description,
                ]);
                return redirect(route('admin.posts'));
            }
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
    public function storeImage($image)
    {
        // $img = Image::make($image->getRealPath());
        $imag   = ImageManagerStatic::make($image)->encode('jpg');
        $name  = Str::random() . '.jpg'; //$image->getClientOriginalExtension();
        Storage::disk('public')->put($name, $imag);
        return $name;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $categries = category::all();
       $post = post::findOrFail($id);
       return view('admin.posts.edit',[
           'categories' => $categries,
           'post' => $post
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
                $post = post::find($id);
                if($request->file('image')){
                    unlink("storage/".$post->image);
                }
                $post->title = $request->title;
                $post->content = $request->content;
                $post->category_id = $request->category;
                $post->description = $request->description;
                $post->user_id = auth()->id();
                $post->image = ($request->image ? $request->file('image')->store('posts', 'public') : post::findOrFail($request->id)->image);
                $post->save();
                return redirect(route('admin.posts'));
    }


}
