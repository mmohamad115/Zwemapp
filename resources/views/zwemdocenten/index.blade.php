@extends('layouts.app')

@section('content')
    <h1>Zwemdocenten</h1>
    <a href="{{ route('zwemdocenten.create') }}" class="btn btn-primary">Add New Zwemdocent</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zwemDocenten as $docent)
                <tr>
                    <td>{{ $docent->voornaam }}</td>
                    <td>{{ $docent->achternaam }}</td>
                    <td>{{ $docent->email }}</td>
                    <td>
                        <a href="{{ route('zwemdocenten.show', $docent) }}" class="btn btn-info">View</a>
                        <a href="{{ route('zwemdocenten.edit', $docent) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('zwemdocenten.destroy', $docent) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection