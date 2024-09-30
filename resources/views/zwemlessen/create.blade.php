@extends('layouts.app')

@section('content')
    <h1>Create Zwemles</h1>

    <form action="{{ route('zwemlessen.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" name="naam" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="beschrijving">Beschrijving</label>
            <textarea name="beschrijving" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="duurtijd">Duurtijd (minuten)</label>
            <input type="number" name="duurtijd" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tijdstip">Tijdstip</label>
            <input type="datetime-local" name="tijdstip" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Create Zwemles</button>
    </form>
@endsection
