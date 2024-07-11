{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h1>{{ $post->title }}</h1>--}}
{{--        <p>{{ $post->content }}</p>--}}
{{--        <p>Author: {{ $post->user->name }}</p>--}}

{{--        <!-- Display Comments -->--}}
{{--        <div class="card mt-4">--}}
{{--            <div class="card-body">--}}
{{--                <h2 class="card-title">Comments</h2>--}}
{{--                <ul class="list-group list-group-flush">--}}
{{--                    @forelse($post->comments as $comment)--}}
{{--                        <li class="list-group-item">--}}
{{--                            <strong>{{ $comment->user->name }}</strong>: {{ $comment->body }}--}}
{{--                        </li>--}}
{{--                    @empty--}}
{{--                        <li class="list-group-item">No comments yet.</li>--}}
{{--                    @endforelse--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Add Comment Form -->--}}
{{--        <div class="card mt-4">--}}
{{--            <div class="card-body">--}}
{{--                <form action="{{ route('comments.store') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="post_id" value="{{ $post->id }}">--}}
{{--                    <div class="form-group mb-3">--}}
{{--                        <label for="body">Add Comment:</label>--}}
{{--                        <textarea class="form-control" name="body" id="body" rows="3" required></textarea>--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-primary">Submit Comment</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}


@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <p>Author: {{ $post->user->name }}</p>


        <div class="card mt-4">
            <div class="card-body">
                <h2 class="card-title">Comments</h2>
                <ul class="list-group list-group-flush">
                    @forelse($post->comments as $comment)
                        <li class="list-group-item">
                            <strong>{{ $comment->user->name }}</strong>: {{ $comment->body }}
                        </li>
                    @empty
                        <li class="list-group-item">No comments yet.</li>
                    @endforelse
                </ul>
            </div>
        </div>


        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group mb-3">
                        <label for="body">Add Comment:</label>
                        <textarea class="form-control" name="body" id="body" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
