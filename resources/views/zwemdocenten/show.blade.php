@extends('layouts.app')

@section('content')
    <h1>Bekijk Zwemles</h1>

    <p><strong>Naam:</strong> {{ $zwemles->naam }}</p>
    <p><strong>Beschrijving:</strong> {{ $zwemles->beschrijving }}</p>
    <p><strong>Duurtijd:</strong> {{ $zwemles->duurtijd }} minuten</p>
    <p><strong>Tijdstip:</strong> {{ $zwemles->tijdstip }}</p>

    <a href="{{ route('zwemlessen.index') }}" class="btn btn-secondary">Terug</a>
    <a href="{{ route('zwemlessen.edit', $zwemles) }}" class="btn btn-warning">Bewerk</a>
    <form action="{{ route('zwemlessen.destroy', $zwemles) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Weet je zeker dat je deze zwemles wilt verwijderen?')">Verwijderen</button>
    </form>
@endsection
