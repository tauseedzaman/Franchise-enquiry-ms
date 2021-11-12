<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\StoreImageRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use App\Models\User;
use Auth;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Sanctum;
use Storage;
use Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

        $request->validate([
            'upload' => "required|file|mimes:png,jpg,jpeg"
        ]);
        if ($request->upload) {
            $image = $request->upload;
            $file = new File();
            $file->uuid = Str::uuid();
            $file->name = $image->getClientOriginalName();
            $file->size = $image->getSize();
            $file->mime = $image->getMimeType();
            $file->extension = Str::lower($image->getClientOriginalExtension());
            $file->disk = 'public';
            $file->path = date('Y').'/'.date('m');
            $file->server_name = md5($image->getRealPath()).'.'.$file->extension;
            $file->user_id = Auth::id();

            $filePath = "storage/".$file->path."/".$file->server_name;
            if ($image->storeAs($file->path, $file->server_name, $file->disk) && $file->save()) {
         $CKEditorFuncNum = $request->input("CKEditorFuncNum");
        $url = asset($filePath);
        $msg = 'Image uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        @header('Content-type: text/html; charset=utf-8');
        echo $response;
            }
        }
    }
    public function uploadAttachment(Request $request)
    {
        $attachment = $request->input('CKEditorFuncNum');
        $file = new File();
        $file->uuid = Str::uuid();
        $file->name = $attachment->getClientOriginalName();
        $file->size = $attachment->getSize();
        $file->mime = $attachment->getMimeType();
        $file->extension = Str::lower($attachment->getClientOriginalExtension());
        $file->disk = 'private';
        $file->path = 'tickets/'.date('Y').'/'.date('m');
        $file->server_name = md5($attachment->getRealPath());
        $file->user_id = Auth::id();
        if ($attachment->storeAs($file->path, $file->server_name, $file->disk) && $file->save()) {
            if ($image->storeAs($file->path, $file->server_name, $file->disk) && $file->save()) {
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
               $url = asset('images/'.$fileName);
               $msg = 'Image uploaded successfully';
               $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               @header('Content-type: text/html; charset=utf-8');
               echo $response;
                   }
    }

}
}
