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
                                        @if($leerling->zwemlessen->isEmpty())
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


        </div>
    </div>
</body>

</html>
