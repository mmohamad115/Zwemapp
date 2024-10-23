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
    @else
        @include('header')
    @endauth
    <div class="flex h-screen">
        <div class="container justify-center content-center	 flex flex-col mx-auto">
            <div class="w-full draggable">
                <div class="container flex flex-col items-center gap-16 mx-auto my-32">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                        <div class="flex flex-col items-center gap-3 px-8 py-10 bg-white rounded-3xl shadow-main">
                            <span>
                                <i class="fa-solid fa-envelope fa-2x text-cyan-400"></i>
                            </span>
                            <p class="text-2xl font-extrabold text-dark-grey-900">Email</p>
                            <p class="text-base leading-7 text-dark-grey-600">Contacteer ons</p>
                            <a class="text-lg font-bold text-purple-blue-500"
                                href = "mailto: SplashZone@example.com">SplashZone@example.com</a>
                        </div>
                        <div class="flex flex-col items-center gap-3 px-8 py-10 bg-white rounded-3xl shadow-main">
                            <span>
                                <i class="fa-solid fa-phone fa-2x text-cyan-400"></i>
                            </span>
                            <p class="text-2xl font-extrabold text-dark-grey-900">Telefoon</p>
                            <p class="text-base leading-7 text-dark-grey-600">Bel ons via dit nummer</p>
                            <a class="text-lg font-bold text-purple-blue-500" href="tel:+44-486-5135">+44-486-5135</a>
                        </div>
                        <div class="flex flex-col items-center gap-3 px-8 py-10 bg-white rounded-3xl shadow-main">
                            <span>
                                <i class="fa-solid fa-location-dot fa-2x text-cyan-400"></i>
                            </span>
                            <p class="text-2xl font-extrabold text-dark-grey-900">Locatie</p>
                            <p class="text-base leading-7 text-dark-grey-600">Uw kan ons vinden</p>
                            <a class="text-lg font-bold text-purple-blue-500" target="_blank"
                                href="https://goo.gl/maps/QcWzYETAh4FS3KTD7">10924 Urna Convallis</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
