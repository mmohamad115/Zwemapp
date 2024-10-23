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

<body class="overflow-x-hidden">
    <div class="">
        @include('header')
        <div class="">
            <div class="">
                <img class="brightness-50" src="photos/swimmingpool.jpeg" alt="swimmingpool">
            </div>
            <div class="justify-center absolute top-1/3 w-screen flex">
                <div class="text-center flex pl-3">
                    <p class="font-sans tracking-tighter font-medium text-white text-5xl ">Geniet van goedkoop <br>
                        en
                        veilig
                        zwemmen</p>
                </div>
            </div>
            <div class="justify-center absolute top-2/4 w-screen flex">
                <div
                    class="bg-cyan-400 hover:bg-cyan-500 hover:cursor-pointer  rounded-md pt-3 pb-4 px-4 drop-shadow-2xl ml-5 mr-2.5">
                    <a class="text-white text-1xl ">Zwemles ABC informatie</a>
                </div>
                <div
                    class="bg-white hover:bg-neutral-200 hover:cursor-pointer rounded-md pt-3 pb-4 px-4 drop-shadow-2xl ml-2.5">
                    <a class="text-cyan-400 text-1xl ">SplashZone Swim Center</a>
                </div>
            </div>
        </div>
    </div>
    <div class=" w-screen">
        <h1 class="justify-center content-center mx-72 mt-32 text-cyan-400 text-3xl mb-3">SplashZone Swim Center</h1>
        <p class="justify-center content-center mx-72 mb-24">
            Bij SplashZone Swim Center bieden we een leuke en veilige omgeving voor zwemmers van alle leeftijden en
            niveaus.
            Onze moderne faciliteit is ontworpen om een eersteklas ervaring te bieden aan iedereen die wil leren
            zwemmen,
            hun vaardigheden wil verbeteren of gewoon wil genieten van een verfrissende duik. Of je nu een beginner bent
            of
            een ervaren zwemmer, ons team van gecertificeerde instructeurs staat klaar om je bij elke stap te
            begeleiden.
        </p>
        <h1 class="justify-center content-center mx-72 text-cyan-400 text-3xl mb-3">Onze Programma's</h1>
        <p class="justify-center content-center mx-72">
            Bij SplashZone Swim Center bieden we verschillende programma's aan om aan ieders behoeften te voldoen. Ons
            doel is om ervoor te zorgen dat alle zwemmers zich zelfverzekerd en bekwaam voelen in het water.

            Beginnerszwemlessen: Speciaal voor kinderen vanaf 4 jaar. Onze beginnerslessen richten zich op het opbouwen
            van watervertrouwen, veiligheid en de basis van zwemmen.
            Zwemlessen voor halfgevorderden: Perfect voor zwemmers die zich comfortabel voelen in het water en hun
            techniek willen verfijnen. We werken aan zwemslagen en uithoudingsvermogen.
            Gevorderde zwemtraining: Voor degenen die hun zwemvaardigheden willen perfectioneren. De lessen zijn gericht
            op snelheid, uithoudingsvermogen en gevorderde technieken.
        </p>
    </div>


    <footer class="bg-white mt-24">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="photos/SSClogo.png" class="h-12" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="/index"
                    class="hover:underline">SplashZone Swim Center™</a>. All Rights
                Reserved.</span>
        </div>
    </footer>


</body>

</html>
