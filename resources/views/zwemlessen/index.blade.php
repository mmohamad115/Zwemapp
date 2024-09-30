@extends('layouts.app')

@section('content')
    <h1>Zwemlessen</h1>
    <a href="{{ route('zwemlessen.create') }}" class="btn btn-primary bg-black">Voeg een nieuwe zwemles toe</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table text-white">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Duurtijd (minuten)</th>
                <th>Tijdstip</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zwemlessen as $zwemles)
                <tr>
                    <td>{{ $zwemles->naam }}</td>
                    <td>{{ $zwemles->beschrijving }}</td>
                    <td>{{ $zwemles->duurtijd }} minuten</td>
                    <td>{{ $zwemles->tijdstip }}</td>
                    <td>
                        <a href="{{ route('zwemlessen.show', $zwemles) }}" class="btn btn-info">Bekijk</a>
                        <a href="{{ route('zwemlessen.edit', $zwemles) }}" class="btn btn-warning">Bewerk</a>
                        <form action="{{ route('zwemlessen.destroy', $zwemles) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Weet je zeker dat je deze zwemles wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
