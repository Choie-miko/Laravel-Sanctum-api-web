@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Comment</div>

                    <div class="card-body">
                        <form action="{{ route('comments.update', $comment) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="body">Content:</label>
                                <textarea id="body" name="body" rows="4" class="form-control" required>{{ $comment->body }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
