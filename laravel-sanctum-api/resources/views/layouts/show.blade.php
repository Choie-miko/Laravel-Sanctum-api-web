@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <p>Author: {{ $post->user->name }}</p>

        <div class="card mt-4">
            <div class="card-body">
                <h2 class="card-title">Comments</h2>
                <ul class="list-group list-group-flush">
                    @forelse($post->comments as $comment)
                        <li class="list-group-item">
                            <strong>{{ $comment->user->name }}</strong>: {{ $comment->body }}

                            @if ($comment->user_id == auth()->id())
                                <a href="{{ route('comments.edit', $comment) }}" class="btn btn-warning btn-sm ml-2">Edit</a>
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>
                                </form>
                            @endif
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

        @if ($post->user_id == auth()->id())
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning mt-3">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Delete</button>
            </form>
        @endif
    </div>
@endsection
