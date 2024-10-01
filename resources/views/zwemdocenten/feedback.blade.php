@extends('layouts.app')

@section('content')
    <h1>Feedback</h1>
    <a href="{{ route('feedback.create') }}" class="btn btn-primary bg-black">Voeg een nieuwe feedback toe</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table text-white">
        <thead>
            <tr>
                <th>Content</th>
                <th>Aanmaakdatum</th>
                <th>Zwemdocent ID</th>
                <th>Leerling ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedback as $feedback)
                <tr>
                    <td>{{ $feedback->content }}</td>
                    <td>{{ $feedback->aanmaakdatum }}</td>
                    <td>{{ $feedback->zwem_docent_id }}</td>
                    <td>{{ $feedback->leerling_id }}</td>
                    <td>
                        <a href="{{ route('feedback.show', $feedback) }}" class="btn btn-info">Bekijk</a>
                        <a href="{{ route('feedback.edit', $feedback) }}" class="btn btn-warning">Bewerk</a>
                        <form action="{{ route('feedback.destroy', $feedback) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Weet je zeker dat je deze feedback wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
