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
                            <a>Zwemlessen</a>
                        </caption>
                        <thead class="text-xs text-gray-100 uppercase bg-cyan-600">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Naam
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Beschrijving
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Duurtijd
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tijdstip
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acties
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-cyan-400 border-b rounded-b-xl">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $zwemles->naam }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $zwemles->beschrijving }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $zwemles->duurtijd }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $zwemles->tijdstip }}
                                </td>
                                <td>
                                    <a href="{{ route('zwemlessen.index') }}"
                                        class="bg-cyan-600 px-2 text-white py-2 rounded-lg ">Terug</a>
                                    <a href="{{ route('zwemlessen.edit', $zwemles) }}"
                                        class="bg-green-500 px-2 text-white py-2 rounded-lg ">Bewerk</a>
                                    <form action="{{ route('zwemlessen.destroy', $zwemles) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 px-2 text-white py-1.5 rounded-lg mr-1"
                                            onclick="return confirm('Weet je zeker dat je deze zwemles wilt verwijderen?')">Verwijder</button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
