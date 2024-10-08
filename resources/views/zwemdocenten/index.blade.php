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
    <div class="">
        <nav class="flex bg-white text-gray-950 ml-16 absolute w-full rounded-b-xl z-50">
            <div class="px-5 xl:px-12  flex w-full items-center">
                <a class="text-3xl font-bold font-heading">
                    <img class="h-20 w-20" src="photos/SSClogoText.png" alt="logo">
                    {{-- SplashZone Swim Center --}}
                </a>
                <ul class="flex px-4 mx-auto font-semibold font-heading space-x-12">
                    <li><a class="hover:text-cyan-400" href="{{ route('profile.edit') }}">Dashboard</a></li>
                    <li><a class="hover:text-cyan-400" href="#">Tijden</a></li>
                    <li><a class="hover:text-cyan-400" href="#">Tarieven</a></li>
                    <li><a class="hover:text-cyan-400" href="#">Contact Us</a></li>
                </ul>
                <div class="items-center space-x-5 items-center mr-14">
                    <div class="items-center space-x-5 items-center flex">
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-900">{{ auth()->user()->name }}</span>
                            <i class="fas fa-user-circle text-gray-900 text-2xl"></i>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class=" items-center ">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-2 py-1 rounded-lg">
                                <i class="fas fa-sign-out-alt text-xs"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="bg-white pr-4 pt-2 flex items-center justify-between h-20">
            <div class="flex items-center space-x-4">
            </div>
        </div>
    </div>
    <div class="flex">
        <aside class="bg-cyan-400 text-white w-64 h-screen p-4 overflow-y-auto relative">
            <nav>
                <ul class="space-y-2">
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-cyan-300 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fa-solid fa-person-swimming mr-2"></i>
                                <a href="{{ route('zwemlessen.index') }}">Zwemlessen</a>
                            </div>
                        </div>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-cyan-300 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fa-solid fa-person-chalkboard mr-2"></i>
                                <a href="{{ route('zwemlessen.create') }}">Toevoegen les</a>
                            </div>
                        </div>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-cyan-300 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fa-solid fa-children mr-2"></i>
                                <a href="{{ route('leerlingen.index') }}">Mijn leerlingen</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="w-full">
            <div class="flex">
                <table class="m-10 w-full shadow-md rounded-xl text-sm text-left rtl:text-right text-white">
                    <div class="bg-blue-400">
                        <caption
                            class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 rounded-t-xl bg-cyan-400">
                            <a>Zwemlessen</a>
                            @if (session('success'))
                                <div class="alert alert-success text-green-500 text-sm">{{ session('success') }}</div>
                            @endif
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
                            @foreach ($zwemlessen as $zwemles)
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
                                        <a href="{{ route('zwemlessen.show', $zwemles) }}"
                                            class="bg-cyan-600 px-2 text-white py-2 rounded-lg ">Bekijk</a>
                                        <a href="{{ route('zwemlessen.edit', $zwemles) }}"
                                            class="bg-green-500 px-2 text-white py-2 rounded-lg ">Bewerk</a>
                                        <form action="{{ route('zwemlessen.destroy', $zwemles) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 px-2 text-white py-1.5 rounded-lg mr-1"
                                                onclick="return confirm('Weet je zeker dat je deze zwemles wilt verwijderen?')">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
    {{-- <table class="table text-gray-950">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Duurtijd</th>
                <th>Tijdstip</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($zwemlessen as $zwemles)
                <tr class="">
                    <td>{{ $zwemles->naam }}</td>
                    <td>{{ $zwemles->beschrijving }}</td>

                    <td>{{ $zwemles->duurtijd }}</td>
                    <td>{{ $zwemles->tijdstip }}</td>

                    <td>{{ $zwemles->duurtijd }} minuten</td>
                    <td>{{ \Carbon\Carbon::parse($zwemles->tijdstip)->format('Y-m-d H:i') }}</td>

                    <td>
                        <a href="{{ route('zwemlessen.show', $zwemles) }}"
                            class="bg-cyan-400 px-2 py-2 rounded-lg ">Bekijk</a>
                        <a href="{{ route('zwemlessen.edit', $zwemles) }}"
                            class="bg-green-500 px-2 py-2 rounded-lg ">Bewerk</a>
                        <form action="{{ route('zwemlessen.destroy', $zwemles) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 px-2 py-1.5 rounded-lg "
                                onclick="return confirm('Weet je zeker dat je deze zwemles wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
</body>

</html>
