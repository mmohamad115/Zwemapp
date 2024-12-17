<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/db1f6bf93f.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="overflow-x-hidden bg-gray-100">
    @include('headerLoggedIn')
    <div class="flex">
        @include('aside')
        <div class="w-full">
            <div class="flex">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center space-x-2 text-gray-800 text-sm font-semibold font-heading">
                            <li class="relative group list-none">
                                <a href="{{ route('eindexamen.index') }}"
                                    class="hover:text-cyan-400 hover:cursor-pointer">Eindexamen</a>
                                <div
                                    class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                                </div>
                            </li>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                            <span>{{ $eindexamen->examen_naam }} </span>
                        </div>
                    </div>
                    <div class="md:flex-1 px-40 pl-8">
                        <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                            {{ $eindexamen->examen_naam }}
                        </h2>
                        <p class="text-gray-500 text-sm pb-1">datum: {{ $eindexamen->tijdstip }}
                        <p class="text-gray-500 text-sm pb-2">duur: {{ $eindexamen->duur }} minuten
                        </p>
                        <p class="text-gray-500"> {{ $eindexamen->beschrijving }}</p>

                        @if (session('error'))
                            <div class="bg-red-500 text-white p-4 rounded">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="bg-green-500 text-white p-4 rounded">
                                {{ session('success') }}
                            </div>
                        @endif

                        <h3 class="mt-6 text-lg font-semibold">Gekoppelde Leerlingen:</h3>
                        <ul>
                            @foreach ($eindexamen->leerlingen as $leerling)
                                <li class="flex justify-between items-center p-2 border-b">
                                    <div>
                                        {{ $leerling->voornaam }} {{ $leerling->achternaam }}
                                        <span
                                            class="ml-2 px-2 py-1 rounded text-sm
                                            @if ($leerling->pivot->status === 'geslaagd') bg-green-100 text-green-800
                                            @elseif($leerling->pivot->status === 'gezakt') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800 @endif">
                                            {{ ucfirst($leerling->pivot->status) }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        @if ($leerling->pivot->status !== 'geslaagd')
                                            <form
                                                action="{{ route('eindexamen.updateStatus', [$eindexamen, $leerling]) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="text-sm rounded border-gray-300"
                                                    onchange="this.form.submit()">
                                                    <option value="aangemeld"
                                                        {{ $leerling->pivot->status === 'aangemeld' ? 'selected' : '' }}>
                                                        Aangemeld</option>
                                                    <option value="geslaagd"
                                                        {{ $leerling->pivot->status === 'geslaagd' ? 'selected' : '' }}>
                                                        Geslaagd</option>
                                                    <option value="gezakt"
                                                        {{ $leerling->pivot->status === 'gezakt' ? 'selected' : '' }}>
                                                        Gezakt</option>
                                                </select>
                                            </form>
                                        @endif

                                        @if ($leerling->pivot->status === 'geslaagd' && !$leerling->pivot->prijs_id)
                                            <form
                                                action="{{ route('eindexamen.toekennenPrijs', [$eindexamen, $leerling]) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                <select name="prijs_id" class="text-sm rounded border-gray-300"
                                                    required>
                                                    <option value="">Selecteer diploma</option>
                                                    @foreach ($prijzen as $prijs)
                                                        <option value="{{ $prijs->prijs_id }}">{{ $prijs->naam }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="submit"
                                                    class="bg-green-500 text-white px-2 py-1 rounded text-sm">
                                                    Ken toe
                                                </button>
                                            </form>
                                        @elseif($leerling->pivot->prijs_id)
                                            <form
                                                action="{{ route('eindexamen.toekennenPrijs', [$eindexamen, $leerling]) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                <select name="prijs_id" class="text-sm rounded border-gray-300" required
                                                    onchange="this.form.submit()">
                                                    @foreach ($prijzen as $prijs)
                                                        <option value="{{ $prijs->prijs_id }}"
                                                            {{ $leerling->pivot->prijs_id == $prijs->prijs_id ? 'selected' : '' }}>
                                                            {{ $prijs->naam }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        @endif

                                        <form
                                            action="{{ route('eindexamen.verwijderLeerling', [$eindexamen, $leerling]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <h3 class="mt-6 text-lg font-semibold">Voeg Leerling toe:</h3>
                        <form method="POST" action="{{ route('eindexamen.koppelLeerling', $eindexamen) }}">
                            @csrf
                            <select class="rounded-lg border-cyan-600" name="leerling_id" required>
                                <option value="">Selecteer een leerling</option>
                                @foreach ($leerlingen as $leerling)
                                    <option value="{{ $leerling->leerling_id }}">{{ $leerling->voornaam }}
                                        {{ $leerling->achternaam }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="mt-2 bg-cyan-600 text-white px-4 py-2 rounded-lg">Voeg
                                Leerling
                                toe</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
