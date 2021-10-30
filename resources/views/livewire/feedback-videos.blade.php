<div class="container">
    <div class="row justify-content-center">
        <div class="col mx-auto my-3 p-2 border-bottom">
            <h1 class="text-center text-success">{{ config("app.name") }} Feedbacks from Users </h1>
        </div>
    </div>
    @foreach ($feedbacks as $feedback)
    <div class="row">
        <div class="col">
            <h4 class="p-2"> {{ $feedback->title }}</h4>
            <div class="embed-responsive embed-responsive-16by9">
                {!! $feedback->video !!}
            </div>
            <p class="p-2 text-info">FeedBack from {{ $feedback->name }} on {{ $feedback->created_at->format("D-M-Y") }}</p>
        </div>
    </div>
    <hr>
    @endforeach
</div>
{{ $feedbacks->links() }}
