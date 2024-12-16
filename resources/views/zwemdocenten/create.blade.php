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
                                <h2 class="leading-relaxed">Maak een zwemles aan</h2>
                                <p class="text-sm text-gray-500 font-normal leading-relaxed">hier kan je een zwemles
                                    aanmaken,
                                    vul alle velden in.</p>
                            </div>
                        </div>
                        <form action="{{ route('zwemlessen.store') }}" method="POST" onsubmit="combineDateTime()">
                            @csrf
                            <div class="divide-y divide-gray-200">
                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong class="font-bold">Oeps!</strong>
                                        <span class="block sm:inline">Er zijn enkele problemen met je invoer.</span>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                    <div class="flex flex-col">
                                        <label for="naam" class="leading-loose">Naam</label>
                                        <input type="text" name="naam" required
                                            class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Naam">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="beschrijving" class="leading-loose">Beschrijving</label>
                                        <textarea name="beschrijving" required
                                            class="px-4 py-2 border resize-none focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Beschrijving"></textarea>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="duurtijd" class="leading-loose">Duurtijd</label>
                                        <input type="number" name="duurtijd" required
                                            class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                            placeholder="Duurtijd">
                                    </div>
                                    <div class="flex items-center space-x-4">
                                        <div class="flex flex-col">
                                            <label for="datum" class="leading-loose">Datum</label>
                                            <input type="date" id="datum" name="datum" required
                                                class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                                placeholder="Datum">
                                        </div>
                                        <div class="flex flex-col">
                                            <label for="tijd" class="leading-loose">Tijd</label>
                                            <input type="time" id="tijd" name="tijd" required
                                                class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                                placeholder="Tijd">
                                        </div>
                                    </div>
                                    <input type="hidden" id="tijd" name="tijd">
                                    <div class="flex flex-col">
                                        <label for="leerlingen" class="leading-loose">Leerlingen</label>
                                        <div class="space-y-2">
                                            @foreach ($leerlingen as $leerling)
                                                <div class="flex items-center">
                                                    <input type="checkbox" name="leerlingen[]" value="{{ $leerling->leerling_id }}"
                                                        class="mr-2">
                                                    <label>{{ $leerling->voornaam }} {{ $leerling->achternaam }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-4 flex items-center space-x-4">
                                    <button type="submit"
                                        class="bg-cyan-400 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Maak
                                        aan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function combineDateTime() {
            const datum = document.getElementById('datum').value;
            const tijd = document.getElementById('tijd').value;
            const tijdstipInput = document.getElementById('tijdstip');
            if (datum && tijd) {
                tijdstipInput.value = `${datum} ${tijd}`;
            }
        }
    </script>
</body>

</html>
