@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @auth
                            <a class="btn btn-link float-right" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth

                        <h2>Welcome, {{ auth()->user()->name }}</h2>

                        <div class="mt-4 mb-4">
                            <h3>Create New Post</h3>
                            <form action="{{ route('posts.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" id="title" name="title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="body">Content:</label>
                                    <textarea id="body" name="body" rows="4" class="form-control" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Create Post</button>
                            </form>
                        </div>

                        <div>
                            <h3>Existing Posts</h3>
                            @foreach($posts as $post)
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ $post->body }}</p>
                                        <p>Author: {{ $post->user->name }}</p>
                                        <h6 class="card-subtitle mb-2 text-muted">Comments:</h6>
                                        <ul class="list-unstyled">
                                            @foreach($post->comments as $comment)
                                                <li>
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
                                            @endforeach
                                        </ul>

                                        <form action="{{ route('comments.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <div class="form-group mb-3">
                                                <label for="comment_body">Add Comment:</label>
                                                <textarea class="form-control" name="body" id="comment_body" rows="3" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                                        </form>

                                        @if ($post->user_id == auth()->id())
                                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning mt-3">Edit</a>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mt-3">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
