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
                        <form action="{{ route('zwemlessen.store') }}" method="POST">
                            @csrf
                            <div class="divide-y divide-gray-200">
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
                                            <label for="tijdstip" class="leading-loose">Tijdstip</label>
                                            <div class="relative focus-within:text-gray-600 text-gray-400">
                                                <input type="time" name="tijdstip" required
                                                    class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                                    placeholder="25/02/2020">
                                                <div class="absolute left-3 top-2">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
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
</body>
</html>

