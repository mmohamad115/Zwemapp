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
                                <a href="{{ route('leerlingen.index') }}"
                                    class="hover:text-cyan-400 hover:cursor-pointer">Leerlingen</a>
                                <div
                                    class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                                </div>
                            </li>
                            <span>
                                <i class="fa-solid fa-angle-right"></i>
                            </span>
                            <span>{{ $leerling->voornaam }} {{ $leerling->achternaam }}</span>
                        </div>
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                        <div class="flex flex-col md:flex-row -mx-4">
                            <div class="md:flex-1 px-4">
                                <div>
                                    <h2
                                        class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                                        Feedback
                                    </h2>
                                    <ul class="pt-1 pb-2 px-3 overflow-y-auto w-96">
                                        @foreach ($leerling->feedback as $feedback)
                                            <li class="mt-2">
                                                <div class="p-5 flex flex-col bg-gray-100 dark:bg-gray-200 rounded-lg">
                                                    <div class="flex justify-between items-center">
                                                        <div class="font-semibold text-gray-700 order-1">
                                                            <i class="fas fa-user-circle text-xl rounded-full mr-2"></i>
                                                            <span class="text-cyan-500 font-semibold">
                                                                {{ $feedback->zwemDocent->voornaam }}
                                                                {{ $feedback->zwemDocent->achternaam }}
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow text-right order-2">
                                                            <p class="text-sm font-medium leading-snug text-gray-600">
                                                                {{ $feedback->aanmaakdatum }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm font-medium leading-snug text-gray-600 my-3">
                                                        {{ $feedback->content }}

                                                    </p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="md:flex-1 px-4">
                                <div>
                                    <h2
                                        class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                                        Zwemles(sen)
                                    </h2>
                                    <ul class="pt-1 pb-2 px-3 overflow-y-auto w-96">
                                        @foreach ($leerling->zwemlessen as $zwemles)
                                            <li class="mt-2">
                                                <div class="p-5 flex flex-col bg-gray-100 dark:bg-gray-200 rounded-lg">
                                                    <div class="flex justify-between items-center">
                                                        <div class="font-semibold text-gray-700 order-1">
                                                            <span class="text-cyan-500 font-semibold">
                                                                {{ $zwemles->naam }}
                                                            </span>
                                                        </div>
                                                        <div class="flex-grow text-right order-2">
                                                            <p class="text-sm font-medium leading-snug text-gray-600">
                                                                om {{ $zwemles->tijdstip }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm font-medium leading-snug text-gray-600 my-3">
                                                        {{ Str::limit($zwemles->beschrijving, 30, '...') }}
                                                    </p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="md:flex-1 px-4">
                                <h2
                                    class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">
                                    {{ $leerling->voornaam }} {{ $leerling->achternaam }}
                                </h2>
                                <p class="text-gray-500 text-sm pb-1">{{ $leerling->geboortedatum }}
                                <p class="text-gray-500 text-sm pb-2">Zwemdiploma {{ $leerling->diploma }}
                                </p>
                                <p class="text-gray-500"></p>
                                <div class="flex py-4 space-x-4">
                                    <form action="{{ route('leerlingen.destroy', $leerling) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="h-10 px-6 py-2 font-semibold rounded-xl bg-red-500 hover:bg-red-700 transiton-all duration-300 ease-in-out text-red-900"
                                            onclick="return confirm('Weet je zeker dat je deze leerling wilt verwijderen?')">Verwijder</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="w-full">
            <div class="flex">
                <table class="m-10 w-full shadow-xl rounded-xl text-sm text-left rtl:text-right text-white">
                    <div class="bg-blue-400">
                        <caption
                            class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 rounded-t-xl bg-cyan-400">
                            <a>Bekijk Leerling</a>
                        </caption>
                        <thead class="text-xs text-gray-100 uppercase bg-cyan-600">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Voornaam
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Achternaam
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Geboortedatum
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Diploma
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gekoppelde zwemles(sen)
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acties
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-cyan-400 border-b rounded-b-xl">
                                <td class="px-6 py-4">
                                    {{ $leerling->voornaam }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $leerling->achternaam }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $leerling->geboortedatum }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $leerling->diploma }}
                                </td>
                                <td class="px-6 py-4">
                                    <ul>
                                        @if ($leerling->zwemlessen->isEmpty())
                                            <li>Geen zwemlessen gekoppeld.</li>
                                        @else
                                            @foreach ($leerling->zwemlessen as $zwemles)
                                                <li>{{ $zwemles->naam }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('leerlingen.index') }}"
                                        class="bg-cyan-600 px-2 text-white py-2 rounded-lg ">Terug</a>
                                    <form action="{{ route('leerlingen.destroy', $leerling) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 px-2 text-white py-2 rounded-lg "
                                            onclick="return confirm('Weet je zeker dat je deze leerling wilt verwijderen?')">Verwijderen</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                </table>
            </div>
            <div class="w-full">
                <div class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900">
                    <a>Leerling Feedback</a>
                </div>
            </div>
            <div class="flex flex-row flex-wrap w-auto">
                @foreach ($leerling->feedback as $feedback)
                    <div class="bg-white m-5 rounded-3xl p-5 shadow-xl w-2/6">
                        <div
                            class="relative flex items-center gap-4 pt-0 pb-8 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                            <div class="flex w-full flex-col gap-0.5">
                                <div class="flex items-center justify-between">
                                    <h5
                                        class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-cyan-400">
                                        {{ $feedback->zwemDocent->voornaam }}
                                        {{ $feedback->zwemDocent->achternaam }}
                                    </h5>
                                    <div class="flex items-center gap-0.5">
                                        © {{ $feedback->aanmaakdatum }}
                                    </div>
                                </div>
                                <p
                                    class="block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                                    Heeft feedback achtergelaten
                                </p>
                            </div>
                        </div>
                        <div class="p-0 mb-6">
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                {{ $feedback->content }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </div>
</body>

</html>
