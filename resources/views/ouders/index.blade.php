<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/db1f6bf93f.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 overflow-x-hidden">
    @include('headerLoggedIn')

    <div class="flex ">
        <aside class="bg-cyan-400 text-white w-64 min-h-screen p-4 overflow-y-auto relative">
            <nav>
                <ul class="space-y-2">
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-cyan-300 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <a href="{{ route('ouders.index') }}">Dashboard</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="flex">
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
                            bg-gray-700 rounded-lg">
                            <h3
                                class="flex items-center pt-1 pb-1 px-8 text-lg font-semibold
                                capitalize dark:text-gray-300">
                                <span>De feedback van de docent</span>
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
                                    @foreach ($leerlingen as $leerling)
                                        @foreach ($leerling->feedback as $fb)
                                            <li class="mt-2">
                                                <a
                                                    class="p-5 flex flex-col justify-between
                                            bg-gray-100 dark:bg-gray-200 rounded-lg">
                                                    <div
                                                        class="flex items-center justify-between
                                                font-semibold capitalize dark:text-gray-700">
                                                        <span> Feedback
                                                        </span>
                                                        <div class="flex items-center">
                                                            <i
                                                                class="h-5 w-5 fill-current mr-1 fa-solid fa-comment-dots"></i>
                                                        </div>
                                                    </div>
                                                    <p
                                                        class="text-sm font-medium leading-snug
                                                text-gray-600 my-3">
                                                        {{ $fb->content }}

                                                    </p>
                                                    <div class="flex justify-between">
                                                        <div class="flex">
                                                            <i class="fas fa-user-circle text-xl rounded-full mr-2"></i>
                                                            <span>
                                                                <span
                                                                    class="text-cyan-500
                                                            font-semibold">
                                                                    {{ $fb->zwemDocent->voornaam }}
                                                                    {{ $fb->zwemDocent->achternaam }}
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <p
                                                            class="text-sm font-medium leading-snug
                                                    text-gray-600">
                                                            © {{ $fb->aanmaakdatum }}
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div
                            class="mr-6 w-1/2 mt-8 py-2 flex-shrink-0 flex flex-col
                                bg-gray-700 rounded-lg">
                            <h3
                                class="flex items-center pt-1 pb-1 px-8 text-lg font-semibold
                                    capitalize dark:text-gray-300">
                                <span>Agenda</span>
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
                            <div class="flex items-center justify-center py-2.5 px-2.5">
                                <div class="max-w-sm w-full">
                                    <div class="p-5 bg-gray-800 rounded-lg">
                                        <div class="px-2 flex items-center justify-between">
                                            <span tabindex="0" class="text-base font-bold text-gray-100">Juli
                                                2024</span>
                                            <div class="flex items-center">
                                                <button aria-label="calendar backward"
                                                    class="focus:text-gray-400 hover:text-gray-400 text-gray-800 dark:text-gray-100">
                                                    <i class="fa-solid fa-chevron-left"></i>
                                                </button>
                                                <button aria-label="calendar forward"
                                                    class="focus:text-gray-400 hover:text-gray-400 ml-3 text-gray-800 dark:text-gray-100">
                                                    <i class="fa-solid fa-chevron-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between pt-12">
                                            <table class="w-full">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="w-full flex justify-center">
                                                                <p
                                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                                    Mo</p>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="w-full flex justify-center">
                                                                <p
                                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                                    Tu</p>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="w-full flex justify-center">
                                                                <p
                                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                                    We</p>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="w-full flex justify-center">
                                                                <p
                                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                                    Th</p>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="w-full flex justify-center">
                                                                <p
                                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                                    Fr</p>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="w-full flex justify-center">
                                                                <p
                                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                                    Sa</p>
                                                            </div>
                                                        </th>
                                                        <th>
                                                            <div class="w-full flex justify-center">
                                                                <p
                                                                    class="text-base font-medium text-center text-gray-800 dark:text-gray-100">
                                                                    Su</p>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="pt-6">
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                            </div>
                                                        </td>
                                                        <td class="pt-6">
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                            </div>
                                                        </td>
                                                        <td class="pt-6">
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    1</p>
                                                            </div>
                                                        </td>
                                                        <td class="pt-6">
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    2</p>
                                                            </div>
                                                        </td>
                                                        <td class="pt-6">
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p class="text-base text-gray-500 dark:text-gray-100">3
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="pt-6">
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p class="text-base text-gray-500 dark:text-gray-100">4
                                                                </p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    5</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    6</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    7</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    8</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="w-full h-full">
                                                                <div
                                                                    class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                                    <a role="link" tabindex="0"
                                                                        class="focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-cyan-600 focus:bg-cyan-600 hover:bg-cyan-600 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-cyan-400 rounded-full">9</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p class="text-base text-gray-500 dark:text-gray-100">
                                                                    10</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p class="text-base text-gray-500 dark:text-gray-100">
                                                                    11</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    12</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    13</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    14</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    15</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="w-full h-full">
                                                                <div
                                                                    class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                                    <a role="link" tabindex="0"
                                                                        class="focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-cyan-600 focus:bg-cyan-600 hover:bg-cyan-600 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-cyan-400 rounded-full">16</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p class="text-base text-gray-500 dark:text-gray-100">
                                                                    17</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p class="text-base text-gray-500 dark:text-gray-100">
                                                                    18</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    19</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    20</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    21</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    22</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="w-full h-full">
                                                                <div
                                                                    class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                                    <a role="link" tabindex="0"
                                                                        class="focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-cyan-600 focus:bg-cyan-600 hover:bg-cyan-600 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-cyan-400 rounded-full">23</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p class="text-base text-gray-500 dark:text-gray-100">
                                                                    24</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p class="text-base text-gray-500 dark:text-gray-100">
                                                                    25</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    26</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    27</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    28</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    29</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="w-full h-full">
                                                                <div
                                                                    class="flex items-center justify-center w-full rounded-full cursor-pointer">
                                                                    <a role="link" tabindex="0"
                                                                        class="focus:outline-none  focus:ring-2 focus:ring-offset-2 focus:ring-cyan-600 focus:bg-cyan-600 hover:bg-cyan-600 text-base w-8 h-8 flex items-center justify-center font-medium text-white bg-cyan-400 rounded-full">30</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="px-2 py-2 cursor-pointer flex w-full justify-center">
                                                                <p
                                                                    class="text-base text-gray-500 dark:text-gray-100 font-medium">
                                                                    31</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="md:py-8 py-5 md:px-16 px-5 bg-gray-700 rounded-b">
                                        <div class="px-4">
                                            <div class="border-b pb-4 border-gray-400 ">
                                                <p class="text-xs font-light leading-3 text-gray-300">
                                                    18:00</p>
                                                <a tabindex="0"
                                                    class="focus:outline-none text-lg font-medium leading-5 text-gray-100 mt-2">Zwemles</a>
                                                <p class="text-sm pt-2 leading-4 leading-none text-gray-300">
                                                    9, 16, 23 en 30 juli is er zwemles</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <aside
                    class="w-1/4 my-1 mr-1 px-6 py-4 flex flex-col
                    dark:text-gray-400 rounded-r-lg overflow-y-auto">
                    <span class="mt-4 text-gray-600">Maandelijkse kosten</span>
                    <span class="mt-1 text-3xl font-semibold">€ 25</span>
                    <button
                        class="mt-8 flex items-center py-4 px-3 text-white rounded-lg
                        bg-green-500 shadow focus:outline-none">
                        <svg class="h-5 w-5 fill-current mr-2 ml-3" viewBox="0 0 24 24">
                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                        </svg>
                        <span>Bekijk de tarieven</span>
                    </button>
                    <div class="mt-12 flex items-center">
                        <span class="text-gray-600">Mijn Kind(eren)</span>
                        <a class="ml-2 text-gray-600">
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                    </div>
                    @foreach ($leerlingen as $leerling)
                        <a
                            class="mt-4 p-4 flex justify-between bg-cyan-400 text-cyan-700 rounded-lg
                        font-semibold capitalize">
                            <div class="flex">
                                <i class="fas fa-user-circle text-xl rounded-full"></i>
                                <div class="flex flex-col ml-2">
                                    <span>{{ $leerling->voornaam }} {{ $leerling->achternaam }}</span>
                                </div>
                            </div>
                            <span>{{ $leerling->groep->groepNaam }}</span>
                        </a>
                    @endforeach
                </aside>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const opcionesConDesplegable = document.querySelectorAll(".opcion-con-desplegable");

                opcionesConDesplegable.forEach(function(opcion) {
                    opcion.addEventListener("click", function() {
                        const desplegable = opcion.querySelector(".desplegable");

                        desplegable.classList.toggle("hidden");
                    });
                });
            });
        </script>
</body>

</html>
