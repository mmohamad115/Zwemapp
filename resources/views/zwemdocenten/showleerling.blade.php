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
    <p><strong>Voornaam:</strong> {{ $leerling->voornaam }}</p>
    <p><strong>Achternaam:</strong> {{ $leerling->achternaam }}</p>
    <p><strong>Geboortedatum:</strong> {{ $leerling->geboortedatum }}</p>
    <p><strong>Diploma:</strong> {{ $leerling->diploma }}</p>

    <p><strong>Voortgang:</strong> {{ $leerling->lessons_completed }} / {{ $totalLessons }}</p>

    <p><strong>Feedback:</strong></p>
    <ul>
        @foreach ($leerling->feedback as $feedback)
            <li>{{ $feedback->content }} ({{ $feedback->aanmaakdatum }})</li>
        @endforeach
    </ul>

<body class="overflow-x-hidden bg-gray-100">
    <div class="">
        <nav class="flex bg-white text-gray-950 ml-16 absolute w-full rounded-b-xl z-50">
            <div class="px-5 xl:px-12  flex w-full items-center">
                <a class="text-3xl font-bold font-heading">
                    <img class="h-20 w-20" src="{{ asset('photos/SSClogoText.png') }}" alt="logo">
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
                                {{-- <th scope="col" class="px-6 py-3">
                                    Feedback
                                </th> --}}
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
                                {{-- <td>
                                    @foreach ($leerling->feedback as $feedback)
                                        <a>{{ $feedback->content }} ({{ $feedback->aanmaakdatum }})</a>
                                    @endforeach
                                </td> --}}
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
                <div class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-cyan-400">
                    <a>Leerling Feedback</a>
                </div>
            </div>
            @foreach ($leerling->feedback as $feedback)
                <div class="bg-white w-2/6 m-5 rounded-3xl p-5 shadow-xl">
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
</body>

</html>


{{-- <h1>Bekijk Leerling</h1>

<p><strong>Voornaam:</strong> {{ $leerling->voornaam }}</p>
<p><strong>Achternaam:</strong> {{ $leerling->achternaam }}</p>
<p><strong>Geboortedatum:</strong> {{ $leerling->geboortedatum }}</p>
<p><strong>Diploma:</strong> {{ $leerling->diploma }}</p>
<p><strong>Feedback:</strong></p>
<ul>
    @foreach ($leerling->feedback as $feedback)
        <li>{{ $feedback->content }} ({{ $feedback->aanmaakdatum }})</li>
    @endforeach
</ul>

<a href="{{ route('leerlingen.index') }}" class="btn btn-secondary">Terug</a>
<form action="{{ route('leerlingen.destroy', $leerling) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"
        onclick="return confirm('Weet je zeker dat je deze leerling wilt verwijderen?')">Verwijderen</button>
</form> --}}
