@extends('layouts.app')

@section('content')
    <h1>Edit Zwemdocent</h1>

    <form action="{{ route('zwemdocenten.update', $zwemDocent) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="voornaam">Voornaam</label>
            <input type="text" name="voornaam" class="form-control" value="{{ $zwemDocent->voornaam }}" required>
        </div>

        <div class="form-group">
            <label for="achternaam">Achternaam</label>
            <input type="text" name="achternaam" class="form-control" value="{{ $zwemDocent->achternaam }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $zwemDocent->email }}" required>
        </div>

        <div class="form-group">
            <label for="wachtwoord">Wachtwoord (leave blank if unchanged)</label>
            <input type="password" name="wachtwoord" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Zwemdocent</button>
    </form>
@endsection
