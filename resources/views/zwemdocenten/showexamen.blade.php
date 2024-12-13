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
                            <span>{{ $eindexamen->examen_naam }} {{ $eindexamen->beschrijving }}</span>
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
                        {{-- <div class="flex py-4 space-x-4">
                            <a href="{{ route('zwemlessen.edit', $eindexamen) }}"
                                class="h-10 px-6 py-2 font-semibold rounded-xl bg-cyan-400 hover:bg-cyan-600 transiton-all duration-300 ease-in-out text-white">
                                Bewerk
                            </a>
                            <form action="{{ route('zwemlessen.destroy', $eindexamen) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="h-10 px-6 py-2 font-semibold rounded-xl bg-red-500 hover:bg-red-700 transiton-all duration-300 ease-in-out text-red-900"
                                    onclick="return confirm('Weet je zeker dat je deze zwemles wilt verwijderen?')">Verwijder</button>
                            </form>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
