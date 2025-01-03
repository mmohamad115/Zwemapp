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

        <div class="min-h-screen w-full py-6 flex flex-col justify-center sm:py-8">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                    <div class="max-w-md mx-auto">
                        <div class="flex items-center space-x-5">
                            <div
                                class="h-14 w-14 bg-cyan-400 rounded-full flex flex-shrink-0 justify-center items-center text-cyan-600 text-2xl font-mono">
                                i</div>
                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                <h2 class="leading-relaxed">Update de zwemles</h2>
                                <p class="text-sm text-gray-500 font-normal leading-relaxed">hier kan je een zwemles
                                    updaten,
                                    vul alle velden in.</p>
                            </div>
                        </div>
                        <form action="{{ route('zwemlessen.update', $zwemles) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="divide-y divide-gray-200">
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <div class="flex flex-col">
                                        <label for="naam" class="leading-loose">Naam</label>
                                        <input type="text" name="naam" value="{{ old('naam', $zwemles->naam) }}"
                                            required
                                            class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Naam">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="beschrijving" class="leading-loose">Beschrijving</label>
                                        <textarea name="beschrijving" required
                                            class="px-4 py-2 border resize-none focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Beschrijving">{{ old('beschrijving', $zwemles->beschrijving) }}</textarea>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="duurtijd" class="leading-loose">Duurtijd</label>
                                        <input type="number" name="duurtijd"
                                            value="{{ old('duurtijd', $zwemles->duurtijd) }}" required
                                            class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Duurtijd">
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <div class="flex flex-col">
                                            <label for="datum" class="leading-loose">Datum</label>
                                            <div class="relative">
                                                <i class="fa-solid fa-calendar-day absolute left-3 top-3 text-gray-400"></i>
                                                <input type="date" id="datum" name="datum"
                                                    value="{{ old('datum', \Carbon\Carbon::parse($zwemles->tijdstip)->format('Y-m-d')) }}" required
                                                    class="pl-10 pr-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                                    placeholder="Datum">
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="tijd" class="leading-loose">Tijd</label>
                                            <div class="relative">
                                                <i class="fa-solid fa-clock absolute left-3 top-3 text-gray-400"></i>
                                                <input type="time" id="tijd" name="tijd"
                                                    value="{{ old('tijd', \Carbon\Carbon::parse($zwemles->tijdstip)->format('H:i')) }}" required
                                                    class="pl-10 pr-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                                    placeholder="Tijd">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="leerlingen" class="leading-loose">Leerlingen</label>
                                        <div class="space-y-2">
                                            @foreach ($leerlingen as $leerling)
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="leerlingen[]"
                                                        value="{{ $leerling->leerling_id }}"
                                                        {{ in_array($leerling->leerling_id, $zwemles->groepen->pluck('leerling_id')->toArray()) ? 'checked' : '' }}
                                                        class="mr-2">
                                                    <label>{{ $leerling->voornaam }} {{ $leerling->achternaam }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4 flex items-center space-x-4">
                                    <button type="submit"
                                        class="bg-cyan-400 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Update
                                        Zwemles
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
