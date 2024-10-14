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
    <div class="">
        <nav class="flex bg-white text-gray-950 ml-16 absolute w-full rounded-b-xl z-50">
            <div class="px-5 xl:px-12  flex w-full items-center">
                <a class="text-3xl font-bold font-heading">
                    <img class="h-20 w-20" src="photos/SSClogo.png" alt="logo">
                    {{-- SplashZone Swim Center --}}
                </a>
                <ul class="flex px-4 mx-auto font-semibold font-heading space-x-12">
                    <li><a class="hover:text-cyan-400" href="{{ route('ouders.index') }}">Dashboard</a></li>
                    <li><a class="hover:text-cyan-400" href="#">Tijden</a></li>
                    <li><a class="hover:text-cyan-400" href="#">Tarieven</a></li>
                    <li><a class="hover:text-cyan-400" href="#">Contact Us</a></li>
                </ul>
                <div class="items-center space-x-5 items-center mr-10">
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

    <div class="flex ">
        <aside class="bg-cyan-400 text-white w-64 min-h-screen p-4 overflow-y-auto relative">
            <nav>
                <ul class="space-y-2">
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-cyan-300 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <span>Agenda</span>
                            </div>
                        </div>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-cyan-300 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-money-bill-wave mr-2"></i>
                                <span>Contabilidad</span>
                            </div>
                        </div>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-cyan-300 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                <span>Informes</span>
                            </div>
                        </div>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-cyan-300 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-file-alt mr-2"></i>
                                <span>Documentación</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="w-full">
            <div class="flex">
                <div class="bg-cyan-400 w-2/6 m-5 rounded-xl">
                    <p class="text-center p-5 text-white text-xl">Abonnement</p>
                </div>
                <div class="bg-cyan-400 w-2/6 m-5 rounded-xl">
                    <p class="text-center p-5 text-white text-xl">Kinderen</p>
                </div>
                <div class="bg-cyan-400 w-2/6 m-5 rounded-xl">
                    <p class="text-center p-5 text-white text-xl">Feedback</p>
                </div>
            </div>
            <div class="flex">
                <div class="w-2/6">
                    <div class="bg-white m-5 p-5 h-24 rounded-3xl">
                        <p>test</p>
                    </div>
                </div>
                <div class="w-2/6">
                    @foreach ($leerlingen as $leerling)
                        <div class="bg-white m-5 p-5 h-24 rounded-3xl">
                            <div class="">
                                <h3 class="text-xl font-semibold">{{ $leerling->voornaam }} {{ $leerling->achternaam }}
                                </h3>
                                <p class="text-gray-600 ">{{ $leerling->groep->groepNaam }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="w-2/6">
                    @foreach ($leerling->feedback as $fb)
                        <div class="bg-white m-5 rounded-3xl p-5">
                            <div
                                class="relative flex items-center gap-4 pt-0 pb-8 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                                <div class="flex w-full flex-col gap-0.5">
                                    <div class="flex items-center justify-between">
                                        <h5
                                            class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                            {{ $fb->zwemDocent->voornaam }} {{ $fb->zwemDocent->achternaam }}
                                            {{-- voornaam achternaam --}}
                                        </h5>
                                        <div class="flex items-center gap-0.5">
                                            © {{ $fb->aanmaakdatum }}
                                        </div>
                                    </div>
                                    <p
                                        class="block font-sans text-base antialiased font-light leading-relaxed text-blue-gray-900">
                                        Heeft feedback achtergelaten
                                    </p>
                                </div>
                            </div>
                            <div class="p-0 mb-6">
                                <p
                                    class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                    {{ $fb->content }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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
