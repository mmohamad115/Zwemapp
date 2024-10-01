@extends('layouts.app')

@section('content')
    <h1>Create Zwemles</h1>

    <form action="{{ route('zwemlessen.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="naam">Naam</label>
            <input type="text" name="naam" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="beschrijving">Beschrijving</label>
            <textarea name="beschrijving" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="duurtijd">Duurtijd (minuten)</label>
            <input type="number" name="duurtijd" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tijdstip">Tijdstip</label>
            <input type="datetime-local" name="tijdstip" class="form-control" required>
        </div>
        {{-- <div class="form-group">
            <label for="groep">Groep</label>
            <select name="groep" id="groep" class="form-control" required>
                <option value="">Select a groep</option>
                @foreach ($groepen as $groep)
                    <option value="{{ $groep->groep_id }}">{{ $groep->groepNaam }}</option>
                @endforeach
            </select>
            @error('groep')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div> --}}
        <button type="submit" class="btn btn-primary">Create Zwemles</button>
    </form>
@endsection
