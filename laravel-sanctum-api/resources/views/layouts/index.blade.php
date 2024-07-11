


{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h1 class="mb-4">Dashboard</h1>--}}

{{--       --}}
{{--        <div class="card mb-4">--}}
{{--            <div class="card-body">--}}
{{--                <h2 class="card-title">Existing Comments</h2>--}}
{{--                @foreach($comments as $comment)--}}
{{--                    <div class="card mb-3">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">{{ $comment->user->name }}</h5>--}}
{{--                            <p class="card-text">{{ $comment->body }}</p>--}}
{{--                            <p class="card-text"><small class="text-muted">Post: {{ $comment->post->title }}</small></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Create New Comment Form -->--}}
{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <h2 class="card-title">Add a Comment</h2>--}}
{{--                <form action="{{ route('comments.store') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group mb-3">--}}
{{--                        <label for="post_id">Post:</label>--}}
{{--                        <select name="post_id" id="post_id" class="form-control">--}}
{{--                            @foreach($posts as $post)--}}
{{--                                <option value="{{ $post->id }}">{{ $post->title }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group mb-3">--}}
{{--                        <label for="body">Comment:</label>--}}
{{--                        <textarea class="form-control" name="body" id="body" rows="3" required></textarea>--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
