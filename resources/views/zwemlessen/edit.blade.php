@extends('layouts.app')

@section('content')
    <h1>Edit Zwemles</h1>

    <form action="{{ route('zwemlessen.update', $zwemles) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" name="naam" class="form-control" value="{{ old('naam', $zwemles->naam) }}" required>
        </div>

        <div class="form-group">
            <label for="beschrijving">Beschrijving</label>
            <textarea name="beschrijving" class="form-control" required>{{ old('beschrijving', $zwemles->beschrijving) }}</textarea>
        </div>

        <div class="form-group">
            <label for="duurtijd">Duurtijd (minuten)</label>
            <input type="number" name="duurtijd" class="form-control" value="{{ old('duurtijd', $zwemles->duurtijd) }}" required>
        </div>

        <div class="form-group">
            <label for="tijdstip">Tijdstip</label>
            <input type="datetime-local" name="tijdstip" class="form-control" value="{{ old('tijdstip', $zwemles->tijdstip ? date('Y-m-d\TH:i', strtotime($zwemles->tijdstip)) : '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Zwemles</button>
    </form>
@endsection
