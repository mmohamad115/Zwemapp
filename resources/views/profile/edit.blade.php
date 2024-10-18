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
        <div class="h-screen w-full flex overflow-hidden select-none">

            <main
                class="my-1 pt-2 pb-2 px-10 flex-1 rounded-l-lg 
                transition duration-500 ease-in-out overflow-y-auto">
                <div class="flex flex-col capitalize text-3xl">
                    <a class="font-semibold">hallo,</a>
                    <a>{{ auth()->user()->name }}!</a>
                </div>
                <div class="flex">
                    <div
                        class="mr-6 w-1/2 mt-8 py-2 flex-shrink-0 flex flex-col
                        bg-gradient-to-tr from-cyan-600 to-cyan-800 rounded-lg">
                        <h3
                            class="flex items-center pt-1 pb-1 px-8 text-lg font-semibold
                            capitalize text-gray-200">
                            <span>Tips en les ideeën voor de docent</span>
                            <button class="ml-2">
                                <svg class="h-5 w-5 fill-current" viewBox="0 0 256 512">
                                    <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9
                                        0l-22.6-22.6c-9.4-9.4-9.4-24.6
                                        0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6
                                        0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136
                                        136c9.5 9.4 9.5 24.6.1 34z"></path>
                                </svg>
                            </button>
                        </h3>
                        <div>
                            <ul class="pt-1 pb-2 px-3 overflow-y-auto">
                                <li class="mt-2">
                                    <a
                                        class="p-5 flex flex-col justify-between
                                        bg-gray-100 dark:bg-gray-200 rounded-lg">
                                        <div
                                            class="flex items-center justify-between
                                            font-semibold capitalize dark:text-gray-700">
                                            <span>Idee</span>
                                            <div class="flex items-center">
                                                <i class="h-5 w-5 fill-current mr-1 fa-solid fa-lightbulb"></i>
                                            </div>
                                        </div>
                                        <p
                                            class="text-sm font-medium leading-snug
                                            text-gray-600 my-3">
                                            Ontwikkel een lesplan voor een groep beginners dat zowel
                                            ademhaling, beenslag, en armtechniek behandelt, binnen een tijdsbestek van
                                            30 minuten. Zorg ervoor dat je voldoende tijd inplant voor demonstratie,
                                            oefenen, en feedback geven.
                                        </p>
                                        <div class="flex justify-between">
                                            <div class="flex">
                                                <i class="fas fa-user-circle text-xl rounded-full mr-2"></i>
                                                <span>
                                                    <span
                                                        class="text-cyan-500
                                                        font-semibold">
                                                        Lewis H.
                                                    </span>
                                                </span>
                                            </div>
                                            <p
                                                class="text-sm font-medium leading-snug
                                                text-gray-600">
                                                7 uur geleden
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li class="mt-2">
                                    <a
                                        class="p-5 flex flex-col justify-between
                                        bg-gray-100 dark:bg-gray-200 rounded-lg">
                                        <div
                                            class="flex items-center justify-between
                                            font-semibold capitalize dark:text-gray-700">
                                            <span>tip</span>
                                            <div class="flex items-center">
                                                <i class="h-5 w-5 fill-current mr-1 fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                        <p
                                            class="text-sm font-medium leading-snug
                                            text-gray-600 my-3">
                                            Zorg voor een balans tussen techniektraining en spelelementen, zodat de
                                            leerlingen gemotiveerd blijven.
                                        </p>
                                        <div class="flex justify-between">
                                            <div class="flex">
                                                <i class="fas fa-user-circle text-xl rounded-full mr-2"></i>
                                                <span>
                                                    <span
                                                        class="text-cyan-500
                                                        font-semibold">
                                                        Alice G.
                                                    </span>
                                                </span>
                                            </div>
                                            <p
                                                class="text-sm font-medium leading-snug
                                                text-gray-600">
                                                16 uur geleden
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div
                        class="mr-6 w-1/2 mt-8 py-2 flex-shrink-0 flex flex-col
                        bg-cyan-400 rounded-lg text-white">
                        <h3
                            class="flex items-center pt-1 pb-1 px-8 text-lg font-bold
                            capitalize">
                            <span>Maak een zwemles aan</span>
                            <button class="ml-2">
                                <svg class="h-5 w-5 fill-current" viewBox="0 0 256 512">
                                    <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9
                                        0l-22.6-22.6c-9.4-9.4-9.4-24.6
                                        0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6
                                        0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136
                                        136c9.5 9.4 9.5 24.6.1 34z"></path>
                                </svg>
                            </button>
                        </h3>
                        <div class="flex flex-col items-center mt-12">
                            <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-state-2130362-1800926.png"
                                alt=" empty schedule" />
                            <span class="font-bold mt-8">Hieronder kan je een zwemles aanmaken</span>
                            <span class="text-cyan-600">
                                Maak een les aan
                            </span>
                            <a href="{{ route('zwemlessen.create') }}"
                                class="mt-4 mb-4 bg-cyan-600 rounded-lg py-2 px-4">
                                Toevoegen les
                            </a>
                        </div>
                    </div>
                </div>
            </main>
            <aside
                class="w-1/4 my-1 mr-1 px-6 py-4 flex flex-col
                dark:text-gray-400 rounded-r-lg overflow-y-auto">
                <span class="mt-4 text-gray-600">Uitbetaald</span>
                <span class="mt-1 text-3xl font-semibold">€ 2,579.44</span>
                <button
                    class="mt-8 flex items-center py-4 px-3 text-white rounded-lg
                    bg-green-500 shadow focus:outline-none">
                    <svg class="h-5 w-5 fill-current mr-2 ml-3" viewBox="0 0 24 24">
                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                    </svg>
                    <span>Bekijk de tarieven</span>
                </button>
                <div class="mt-12 flex items-center">
                    <span>Betaald</span>
                    <button class="ml-2 focus:outline-none">
                        <svg class="h-5 w-5 fill-current" viewBox="0 0 256 512">
                            <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9
                                0l-22.6-22.6c-9.4-9.4-9.4-24.6
                                0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3
                                103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1
                                34z"></path>
                        </svg>
                    </button>
                </div>
                <a
                    class="mt-4 p-4 flex justify-between bg-gray-300 rounded-lg
                    font-semibold capitalize">
                    <div class="flex">
                        <i class="fas fa-user-circle text-xl rounded-full"></i>
                        <div class="flex flex-col ml-2">
                            <span>jimmy</span>
                        </div>
                    </div>
                    <span>€ 25</span>
                </a>
                <a
                    class="mt-2 p-4 flex justify-between bg-gray-300 rounded-lg
                    font-semibold capitalize">
                    <div class="flex">
                        <i class="fas fa-user-circle text-xl rounded-full"></i>
                        <div class="flex flex-col ml-2">
                            <span>Juan</span>
                        </div>
                    </div>
                    <span>€ 25</span>
                </a>
                <a
                    class="mt-2 p-4 flex justify-between bg-gray-300 rounded-lg
                    font-semibold capitalize">
                    <div class="flex">
                        <i class="fas fa-user-circle text-xl rounded-full"></i>
                        <div class="flex flex-col ml-2">
                            <span>Hector</span>
                        </div>
                    </div>
                    <span>€ 25</span>
                </a>
            </aside>
        </div>
    </div>
</body>

</html>
