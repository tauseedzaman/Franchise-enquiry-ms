@extends('admin.layouts.master')
@section('page') Manage Testimonials @endsection

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
                    <div class="row p-5" style="margin: 10px">
                        <div class="col p-5">
                            <form action="{{ route("admin.testimonial.store") }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8" class=" border-2  rounded p-3" >
                            @csrf
                                <h3 class="text-capitalize text-info p-2  mb-3 text-center text-lg rounded" >{{ __("Add Testimonial") }}</h3>
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Testimonial Title">
                                @error('title') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="status">Testimonial Status</label>
                                <select id="status" alue="{{ old('status') }}" class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                                @error('status') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="alert alert-warning text-sm p-1" role="alert">
                            Only the latest active Testimonial will be displayed on <a href="{{ route("testimonial") }}" target="__blenk">Testimonials </a> Page
                            </div>

                            <div class="form-group">
                                <label for="content">Testimonial Description</label>
                                <textarea name="description" id="" rows="3" cols="80" class="form-control"   placeholder=" Description..">{{ old("description") }}</textarea>
                                @error('description') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="content">Content</label>
                                <textarea name="content" id="CKEeditor" rows="10" cols="80" value="{{ old('content') }}" class="form-control"   placeholder="Content...."></textarea>
                                @error('content') <span class="text-red-500 text-danger text-xs">{{ $message }}</span> @enderror
                            </div>
                                <div class="form-group mt-3">
                                    <input type="submit" class="btn btn-primary  " value="{{ __("Submit") }}">
                                </div>
                                <script>
                                    // CKEDITOR.replace( '' );
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
