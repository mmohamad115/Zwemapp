@extends('layouts.app')

@section('content')
    <h1>Leerlingen</h1>

    <table class="table text-white">
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Geboortedatum</th>
                <th>Diploma</th>
                <th>Feedback</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leerlingen as $leerling)
                <tr>
                    <td>{{ $leerling->voornaam }}</td>
                    <td>{{ $leerling->achternaam }}</td>
                    <td>{{ $leerling->geboortedatum }}</td>
                    <td>{{ $leerling->diploma }}</td>
                    <td>
                        @foreach ($leerling->feedback as $feedback)
                            <div>{{ $feedback->content }} ({{ $feedback->aanmaakdatum }})</div>
                            <form action="{{ route('feedback.destroy', $feedback) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('feedback.edit', $feedback) }}" class="btn btn-warning btn-sm">Bewerk
                                    Feedback</a>

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Weet je zeker dat je deze feedback wilt verwijderen?')">Verwijder
                                    Feedback</button>
                            </form>
                        @endforeach
                        <a href="{{ route('feedback.create', ['leerling_id' => $leerling->id]) }}"
                            class="btn btn-primary btn-sm">Voeg Feedback Toe</a>
                    </td>
                    <td>
                        <a href="{{ route('leerlingen.show', $leerling) }}" class="btn btn-info btn-sm">Bekijk</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
