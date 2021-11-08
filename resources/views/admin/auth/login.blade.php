@extends('admin.layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card shadow my-3">
                <h1 class="card-header text-center p-4 shadow bg-info">{{ config("app.name").__(' Login ') }}</h1>
                <div class="card-body">
                    <form method="POST" action="{{ route("admin.HandleLogin") }}">
                        @csrf

                        <div class="form-group row row my-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right" >{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6 ">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-4" >
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 ">
                                <button type="submit" class="btn btn-success btn-block">
                                    {{ __('Login') }}
                                </button>
                                <br />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
