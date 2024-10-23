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
            <div class=" bg-gray-100 flex justify-center items-center">
                <div class="container mx-auto rounded-lg px-14 py-8">
                    <form method="GET" action="{{ route('leerlingen.index') }}">
                        <h1 class="text-center font-bold text-gray-700 my-6 text-4xl">Leerlingen</h1>
                        <div class="sm:flex items-center bg-white rounded-lg overflow-hidden px-2 py-1 justify-between">
                            <input
                                class="text-base text-gray-400 flex-grow outline-none border-none focus-none px-2 focus:ring-0 focus:ring-transparent"
                                type="text" name="search" placeholder="Zoek naar Leerlingen"
                                value="{{ request('search') }}" />
                            <div class="ms:flex items-center px-2 rounded-lg space-x-4 mx-auto">
                                <button
                                    class="bg-cyan-600 text-white text-base rounded-lg px-4 py-2 font-sans text-xs font-bold uppercase">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="w-full">
                <div class="flex flex-wrap">
                    @foreach ($leerlingen as $leerling)
                        <div
                            class="m-5 hover:scale-105 transition-all duration-300 ease-in-out max-w-[24rem] w-96 rounded-lg border border-blue-gray-50 bg-white p-4 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10">
                            <div class="flex items-center justify-between gap-4 mb-2">
                                <i
                                    class="relative inline-block object-cover object-center fa-solid fa-circle-user fa-2x"></i>
                                <a href="{{ route('leerlingen.show', $leerling) }}"
                                    class="select-none rounded-lg bg-cyan-600 py-2 px-3 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button" data-ripple-light="true">
                                    Bekijk
                                </a>
                            </div>
                            <h6
                                class="flex items-center gap-2 mb-2 font-sans text-base antialiased font-medium leading-relaxed tracking-normal text-blue-gray-900">
                                <span> {{ $leerling->voornaam }} {{ $leerling->achternaam }}</span>
                            </h6>
                            @foreach ($leerling->feedback as $feedback)
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700">
                                    {{ Str::limit($feedback->content, 50, '...') }}
                                    ({{ $feedback->aanmaakdatum }})
                                </p>
                            @endforeach
                            <div class="flex items-center gap-8 pt-4 mt-6 border-t border-blue-gray-50">
                                <p
                                    class="flex items-center gap-1 font-sans text-xs antialiased font-normal text-gray-700">
                                    <i class="fa-solid fa-cake-candles"></i>
                                    {{ $leerling->geboortedatum }}
                                </p>
                                <a href="{{ route('feedback.create', ['leerling_id' => $leerling->leerling_id]) }}"
                                    class="flex items-center gap-1 font-sans text-xs antialiased font-normal text-gray-700">
                                    Maak Feedback
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
