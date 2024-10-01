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
        {{-- <div class="form-group">
            <label for="zwem_docent_id">Zwemdocent ID</label>
            <select name="zwem_docent_id" id="zwem_docent_id" class="form-control" required>
                <option value="">Select a zwemdocent</option>
                @foreach ($zwemDocenten as $zwemDocent)
                    <option value="{{ $zwemDocent->zwem_docent_id }}">{{ $zwemDocent->name }}</option>
                @endforeach
            </select>
            @error('zwem_docent_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="leerling_id">Leerling ID</label>
            <input type="number" name="leerling_id" id="leerling_id" class="form-control">
            @error('leerling_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
