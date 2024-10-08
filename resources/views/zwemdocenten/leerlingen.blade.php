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
                <table class="m-10 w-full shadow-md rounded-xl text-sm text-left rtl:text-right text-white">
                    <div class="bg-blue-400">
                        <caption
                            class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 rounded-t-xl bg-cyan-400">
                            <a>Leerlingen</a>
                            @if (session('success'))
                                <div class="alert alert-success text-green-500 text-sm">{{ session('success') }}</div>
                            @endif
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
                                    Feedback
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acties
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leerlingen as $leerling)
                                <tr class="bg-cyan-400 border-b rounded-b-xl">
                                    <td class="px-6 py-4 ">
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
                                        @foreach ($leerling->feedback as $feedback)
                                            <div class="m-2">{{ Str::limit($feedback->content, 20, '...') }}
                                                ({{ $feedback->aanmaakdatum }})
                                            </div>
                                            <form action="{{ route('feedback.destroy', $feedback) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('feedback.edit', $feedback) }}"
                                                    class="px-2 py-1 bg-green-500 rounded-lg">Bewerk
                                                    Feedback</a>

                                                <button type="submit" class="px-2 py-1 bg-red-500 rounded-lg"
                                                    onclick="return confirm('Weet je zeker dat je deze feedback wilt verwijderen?')">Verwijder
                                                    Feedback</button>
                                            </form>
                                        @endforeach
                                        <a href="{{ route('feedback.create', ['leerling_id' => $leerling->id]) }}"
                                            class="px-2 py-1 bg-cyan-600 rounded-lg">Voeg Feedback Toe</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('leerlingen.show', $leerling) }}"
                                            class="bg-cyan-600 px-2 text-white py-2 rounded-lg ">Bekijk</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
</body>

</html>