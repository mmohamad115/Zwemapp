@extends('layouts.app')

@section('content')
    <h1 class="text-white">Create Feedback</h1>

    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="leerling_id">Leerling</label>
            <select name="leerling_id" id="leerling_id" class="form-control" required>
                <option value="">Select a leerling</option>
                @foreach ($leerlingen as $leerling)
                    <option value="{{ $leerling->leerling_id }}">{{ $leerling->voornaam }} {{ $leerling->achternaam }}
                    </option>
                @endforeach
            </select>
            @error('leerling_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
