@extends('layouts.app')

@section('content')
    <h1>Bekijk Leerling</h1>

    <p><strong>Voornaam:</strong> {{ $leerling->voornaam }}</p>
    <p><strong>Achternaam:</strong> {{ $leerling->achternaam }}</p>
    <p><strong>Geboortedatum:</strong> {{ $leerling->geboortedatum }}</p>
    <p><strong>Diploma:</strong> {{ $leerling->diploma }}</p>
    <p><strong>Feedback:</strong></p>
    <ul>
        @foreach ($leerling->feedback as $feedback)
            <li>{{ $feedback->content }} ({{ $feedback->aanmaakdatum }})</li>
        @endforeach
    </ul>

    <a href="{{ route('leerlingen.index') }}" class="btn btn-secondary">Terug</a>
    <form action="{{ route('leerlingen.destroy', $leerling) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Weet je zeker dat je deze leerling wilt verwijderen?')">Verwijderen</button>
    </form>
@endsection
