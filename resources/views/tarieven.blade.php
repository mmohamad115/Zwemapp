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
    @auth
        @include('headerLoggedIn')
    @endauth
    @guest
        @include('header')
    @endguest
    <div class="flex">
        @auth
            @include('aside')
        @endauth
        <main class="mt-5 ml-16 py-4">
            <div class="flex flex-col space-y-8">
                <!-- First Row -->
                <div class="grid grid-cols-5 px-2 xl:p-0 gap-y-4 md:gap-6">
                    <div class="md:col-span-2 xl:col-span-3 bg-white p-6 rounded-2xl border border-gray-50">
                        <div class="flex flex-col space-y-6 md:h-full md:justify-between">
                            <div class="flex justify-between">
                                <span class="text-xs text-gray-500 font-semibold uppercase tracking-wider">
                                    Uitgave
                                </span>
                            </div>
                            <div class="flex gap-2 md:gap-4 justify-between items-center">
                                <div class="flex flex-col space-y-4">
                                    <h2 class="text-gray-800 font-bold tracking-widest leading-tight">
                                        {{ auth()->user()->name }} uitgaves</h2>
                                    <div class="flex items-center gap-4">
                                        <p class="text-lg text-gray-600 tracking-wider">**** **** *321</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </div>
                                </div>
                                <h2 class="text-lg md:text-xl xl:text-3xl text-gray-700 font-black tracking-wider">
                                    <span class="md:text-xl">$</span>
                                    92,817.45
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-span-2 p-6 rounded-2xl bg-gradient-to-r from-cyan-500 to-cyan-800 flex flex-col justify-between">
                        <div class="flex flex-col">
                            <p class="text-white font-bold">Lorem ipsum dolor sit amet</p>
                            <p class="mt-1 text-xs md:text-sm text-gray-50 font-light leading-tight max-w-sm">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio soluta saepe consequuntur
                                facilis ab a. Molestiae ad saepe assumenda praesentium rem dolore? Exercitationem, neque
                                obcaecati?
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End First Row -->
                <!-- Start Second Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 px-4 xl:p-0 gap-4 xl:gap-6">
                    <div class="col-span-1 md:col-span-2 lg:col-span-4 flex justify-between">
                        <h2 class="text-xs md:text-sm text-gray-700 font-bold tracking-wide md:tracking-wider">
                            Betalingen per categorie</h2>
                        <a href="#" class="text-xs text-gray-800 font-semibold uppercase">More</a>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-50">
                        <div class="flex justify-between items-start">
                            <div class="flex flex-col">
                                <p class="text-xs text-gray-600 tracking-wide">Foods & Beverages</p>
                                <h3 class="mt-1 text-lg text-blue-500 font-bold">$ 818</h3>
                                <span class="mt-4 text-xs text-gray-500">Last Transaction 3 Hours ago</span>
                            </div>
                            <div class="bg-blue-500 p-2 md:p-1 xl:p-2 rounded-md">
                                <img src="https://atom.dzulfarizan.com/assets/dish-2.png" alt="icon"
                                    class="w-auto h-8 md:h-6 xl:h-8 object-cover">
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-50">
                        <div class="flex justify-between items-start">
                            <div class="flex flex-col">
                                <p class="text-xs text-gray-600 tracking-wide">Groceries</p>
                                <h3 class="mt-1 text-lg text-green-500 font-bold">$ 8,918</h3>
                                <span class="mt-4 text-xs text-gray-500">Last Transaction 3 Days ago</span>
                            </div>
                            <div class="bg-green-500 p-2 md:p-1 xl:p-2 rounded-md">
                                <img src="https://atom.dzulfarizan.com/assets/grocery.png" alt="icon"
                                    class="w-auto h-8 md:h-6 xl:h-8 object-cover">
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-50">
                        <div class="flex justify-between items-start">
                            <div class="flex flex-col">
                                <p class="text-xs text-gray-600 tracking-wide">Gaming</p>
                                <h3 class="mt-1 text-lg text-yellow-500 font-bold">$ 1,223</h3>
                                <span class="mt-4 text-xs text-gray-600">Last Transaction 4 Days ago</span>
                            </div>
                            <div class="bg-yellow-500 p-2 md:p-1 xl:p-2 rounded-md">
                                <img src="https://atom.dzulfarizan.com/assets/gaming.png" alt="icon"
                                    class="w-auto h-8 md:h-6 xl:h-8 object-cover">
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-50">
                        <div class="flex justify-between items-start">
                            <div class="flex flex-col">
                                <p class="text-xs text-gray-600 tracking-wide">Trip & Holiday</p>
                                <h3 class="mt-1 text-lg text-indigo-500 font-bold">$ 5,918</h3>
                                <span class="mt-4 text-xs text-gray-500">Last Transaction 1 Month ago</span>
                            </div>
                            <div class="bg-indigo-500 p-2 md:p-1 xl:p-2 rounded-md">
                                <img src="https://atom.dzulfarizan.com/assets/holiday.png" alt="icon"
                                    class="w-auto h-8 md:h-6 xl:h-8 object-cover">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Second Row -->
                <!-- Start Third Row -->
                <div class="grid grid-cols-1 md:grid-cols-5 items-start px-4 xl:p-0 gap-y-4 md:gap-6">
                    <div class="col-start-1 col-end-5">
                        <h2 class="text-xs md:text-sm text-gray-800 font-bold tracking-wide">Summary Transactions</h2>
                    </div>
                    <div class="col-span-3 bg-white p-6 rounded-xl border border-gray-50 flex flex-col space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-sm text-gray-600 font-bold tracking-wide">Latest Transactions</h2>
                            <a href="#"
                                class="px-4 py-2 text-xs bg-blue-100 text-blue-500 rounded uppercase tracking-wider font-semibold hover:bg-blue-300">More</a>
                        </div>
                        <ul class="divide-y-2 divide-gray-100 overflow-x-auto w-full">
                            <li class="py-3 flex justify-between text-sm text-gray-500 font-semibold">
                                <p class="px-4 font-semibold">Today</p>
                                <p class="px-4 text-gray-600">Zwemles</p>
                                <p class="px-4 tracking-wider">Cash</p>
                                <p class="px-4 text-blue-600">Food</p>
                                <p class="md:text-base text-gray-800 flex items-center gap-2">
                                    16.90
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </p>
                            </li>
                            <li class="py-3 flex justify-between text-sm text-gray-500 font-semibold">
                                <p class="px-4 font-semibold">Today</p>
                                <p class="px-4 text-gray-600">Zwemles</p>
                                <p class="px-4 tracking-wider">Cash</p>
                                <p class="px-4 text-blue-600">Food</p>
                                <p class="md:text-base text-gray-800 flex items-center gap-2">
                                    16.90
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </p>
                            </li>
                            <li class="py-3 flex justify-between text-sm text-gray-500 font-semibold">
                                <p class="px-4 font-semibold">Today</p>
                                <p class="px-4 text-gray-600">Zwemles</p>
                                <p class="px-4 tracking-wider">Cash</p>
                                <p class="px-4 text-blue-600">Food</p>
                                <p class="md:text-base text-gray-800 flex items-center gap-2">
                                    16.90
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </p>
                            </li>
                            <li class="py-3 flex justify-between text-sm text-gray-500 font-semibold">
                                <p class="px-4 font-semibold">Today</p>
                                <p class="px-4 text-gray-600">Zwemles</p>
                                <p class="px-4 tracking-wider">Cash</p>
                                <p class="px-4 text-blue-600">Food</p>
                                <p class="md:text-base text-gray-800 flex items-center gap-2">
                                    16.90
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </p>
                            </li>
                            <li class="py-3 flex justify-between text-sm text-gray-500 font-semibold">
                                <p class="px-4 font-semibold">Today</p>
                                <p class="px-4 text-gray-600">Zwemles</p>
                                <p class="px-4 tracking-wider">Cash</p>
                                <p class="px-4 text-blue-600">Food</p>
                                <p class="md:text-base text-gray-800 flex items-center gap-2">
                                    16.90
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </p>
                            </li>
                            <li class="py-3 flex justify-between text-sm text-gray-500 font-semibold">
                                <p class="px-4 font-semibold">Today</p>
                                <p class="px-4 text-gray-600">Zwemles</p>
                                <p class="px-4 tracking-wider">Cash</p>
                                <p class="px-4 text-blue-600">Food</p>
                                <p class="md:text-base text-gray-800 flex items-center gap-2">
                                    16.90
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Third Row -->
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>
</body>

</html>
