@extends("layouts.app")
@section("content")
<main>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

    <div class="container">
        <div class="row  mt-4 justify-content-around">
            <div class="col ">
                <h1 class=""><b>Ticket</b></h1>
            </div>
            <div class="col float-right text-right ">
                <a href="{{ route(" auth.supportTeckets") }}" class="btn btn-primary" type="button"><b>Return To Tickets
                        List</b></a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col my-3">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {!! session('message') !!}
                    </div>
                    @endif
                </div>
                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <h3 class="card-header bg-light">This is the title </h3>
                    <div class="card-body">
                        {!!  !!}
                    </div>
                </div>

                <div class="card shadow-lg border-0 rounded-lg mt-2">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route(" auth.StoreTicket") }}">
                            @csrf
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Enter Ticket Subject</label>
                                        <input class="form-control @error(" subject") is-invalid @enderror" id="subject"
                                            type="text" name="subject" value="{{ old(" subject") }}"
                                            placeholder="Enter ticket Subject" autofocus />
                                        @error("subject") <span class="text-danger px-3">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="body">Ticket body</label>
                                        <textarea name="body" id="CKEeditor" rows="10" cols="80"
                                            value="{{ old('body') }}" class="form-control"
                                            placeholder="Ticket body"></textarea>
                                        @error('body') <span class="text-red-500 text-danger text-xs">{{ $message
                                            }}</span> @enderror
                                    </div>
                                    <script>
                                        CKEDITOR.replace('CKEeditor', {
                                        filebrowserUploadUrl: "{{route('auth.storeFile', ['_token' => csrf_token() ])}}",
                                        filebrowserUploadMethod: 'form',

                                    });
                                    </script>
                                </div>
                            </div>
                            <h3 id="timer" class="text-danger text-center "></h3>
                            <div class="mt-1 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit"
                                        id="btn">Submit</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
