@extends('layouts.app')

@section('content')
    <h1>Add New Zwemdocent</h1>

    <form action="{{ route('zwemdocenten.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="voornaam">Voornaam</label>
            <input type="text" name="voornaam" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="achternaam">Achternaam</label>
            <input type="text" name="achternaam" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="wachtwoord">Wachtwoord</label>
            <input type="password" name="wachtwoord" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Zwemdocent</button>
    </form>
@endsection
