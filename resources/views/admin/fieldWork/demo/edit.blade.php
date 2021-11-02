@extends('admin.layouts.master')

@section('content')
<div class="content">
    {{-- CKE editor link --}}
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <div class="container-fluid">
        <div class="row">
                      <div class="col">
                        @if (session()->has('message'))
                        <div class="alert alert-success"  >
                            <p  class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </p>
                            {{ session('message') }}
                        </div>
                    </div>
                        @endif
                      </div>
                    </div>
                    <div class="row p-2" style="">
                        <div class="col p-2">
                            <form action="{{ route('admin.field.work.demo.update',$post->id    ) }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class=" border-2  rounded p-3" >
                            @csrf
                                <h3 class="text-capitalize text-info p-2  mb-3 text-center text-lg rounded" >{{ __("Edit Field Work Demo") }}</h3>
                                <br>
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Demo Title">
                                @error('title') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
                            </div>
                            <input type="hidden" name="id" value="{{ $post->id }}" id="">
                            <br>
                            <div class="form-group">
                                <label for="category">Demo Status</label>
                                <select class="form-control" name="status" id="" value="{{ old('status') }}"  >
                                        <option value="1" @if($post->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($post->status == 0) selected @endif>Not Active</option>
                                </select>
                                @error('status') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="description">Demo Description</label>
                                <textarea id="description" class="form-control" value="{{ old('description') }}" name="description" rows="3">{{ $post->description }}</textarea>
                                @error('description') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="content">Demo Content</label>
                                <textarea name="content" id="CKEeditor" rows="10" cols="80" value="{{ old('content') }}" class="form-control"   placeholder="Post Content">{{ $post->content }}</textarea>
                                @error('content') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
                            </div>
                            <br>
                                <div class="form-group ">
                                    <input type="submit" class="btn btn-primary " value="{{ __("Submit") }}">
                                </div>
                                <script>
                                    CKEDITOR.replace('CKEeditor', {
                                        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                        filebrowserUploadMethod: 'form'
                                    });
                                </script>
                            </form>
                        </div>
             </div>
        </div>

        </div>
    </div>

</div>


@endsection
