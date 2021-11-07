<main>
    <div class="container">
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
                    <h1 class="border-bottom pl-3 p-3 shadow text-center bg-info rounded card-header">Submit Url</h1>
                    <div class="card-body">
                        <form wire:submit.prevent="save_url()">
                            <div class="row mb-1">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Enter Url</label>
                                        <input class="form-control @error(" url") is-invalid @enderror" id="url"
                                            type="url" wire:model.lazy="url" placeholder="Enter URL" autofocus />
                                        @error("url") <span class="text-danger px-3">{{ $message }} </span> @enderror
                                        @if (session()->has('error'))
                                        <div class=" my-2 p-2 alert alert-danger">
                                           <b > {{ session('error') }}</b>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <h3 id="timer" class="text-danger text-center "></h3>
                            <div class="mt-1 mb-0">
                                <div class="d-grid"><button class="btn btn-primary btn-block"
                                        type="submit" onclick="">Submit</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
