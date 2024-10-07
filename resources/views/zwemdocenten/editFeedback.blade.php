@extends('layouts.app')

@section('content')
    <h1>Edit Feedback</h1>

    <form action="{{ route('feedback.update', $feedback) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" name="content" class="form-control" value="{{ old('content', $feedback->content) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Feedback</button>
    </form>
@endsection
