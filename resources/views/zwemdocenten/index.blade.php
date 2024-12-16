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
                    <form method="GET" action="{{ route('zwemlessen.index') }}">
                        <h1 class="text-center font-bold text-gray-700 my-6 text-4xl">Zwemlessen</h1>
                        <div class="sm:flex items-center bg-white rounded-lg overflow-hidden px-2 py-1 justify-between">
                            <input
                                class="text-base text-gray-400 flex-grow outline-none border-none focus-none px-2 focus:ring-0 focus:ring-transparent"
                                type="text" name="search" placeholder="Zoeken naar zwemlessen"
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
                    @foreach ($zwemlessen as $zwemles)
                        <div
                            class="m-5 hover:scale-105 transition-all duration-300 ease-in-out max-w-[24rem] rounded-lg border border-blue-gray-50 bg-white p-4 font-sans text-sm font-normal text-blue-gray-500 shadow-lg shadow-blue-gray-500/10">
                            <div class="flex items-center justify-between gap-4 mb-2">
                                <a class="relative inline-block object-cover object-center rounded-full font-medium">
                                    {{ $zwemles->naam }}
                                </a>
                                <a href="{{ route('zwemlessen.show', $zwemles) }}"
                                    class="select-none rounded-lg bg-cyan-600 py-2 px-3 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                    Bekijk
                                </a>
                            </div>
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-gray-700">
                                {{ $zwemles->beschrijving }}
                            </p>
                            <div class="flex items-center gap-8 pt-4 mt-6 border-t border-blue-gray-50">
                                <p
                                    class="flex items-center gap-1 font-sans text-xs antialiased font-normal text-gray-700">
                                    <i class="fa-solid fa-clock"></i>
                                    {{ $zwemles->tijd }}
                                </p>
                                <a
                                    class="flex items-center gap-1 font-sans text-xs antialiased font-normal text-gray-700">
                                    <i class="fa-solid fa-calendar-day"></i>
                                    {{ $zwemles->datum }}
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
