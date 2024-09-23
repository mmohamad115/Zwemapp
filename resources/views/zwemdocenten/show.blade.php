@extends('layouts.app')

@section('content')
    <h1>View Zwemdocent</h1>

    <p><strong>Voornaam:</strong> {{ $zwemDocent->voornaam }}</p>
    <p><strong>Achternaam:</strong> {{ $zwemDocent->achternaam }}</p>
    <p><strong>Email:</strong> {{ $zwemDocent->email }}</p>

    <a href="{{ route('zwemdocenten.index') }}" class="btn btn-secondary">Back</a>
@endsection
