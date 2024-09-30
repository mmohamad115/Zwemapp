<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALUD 360</title>
    <!-- Agregar el enlace al archivo de estilos de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Agregar el enlace al archivo de la biblioteca FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Navegación Superior -->
    <div class="">
        <nav class="flex bg-white text-gray-950 ml-16 absolute w-11/12 rounded-b-xl z-50">
            <div class="px-5 xl:px-12  flex w-full items-center">
                <a class="text-3xl font-bold font-heading">
                    <img class="h-20 w-20" src="photos/SSClogoText.png" alt="logo">
                    {{-- SplashZone Swim Center --}}
                </a>
                <ul class="px-4 mx-auto font-semibold font-heading space-x-12">
                    <li><a class="hover:text-cyan-400">Dashboard</a></li>
                </ul>
                <div class="items-center space-x-5 items-center">
                    <div class="items-center space-x-5 items-center">
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-900">{{ auth()->user()->name }}</span>
                            <i class="fas fa-user-circle text-gray-900 text-2xl"></i>
                        </div>
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
        <aside class="bg-blue-500 text-white w-64 h-screen p-4 overflow-y-auto">
            <nav>
                <ul class="space-y-2">
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-blue-400 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <span>Agenda</span>
                            </div>
                        </div>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-blue-400 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-money-bill-wave mr-2"></i>
                                <span>Contabilidad</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                        <ul class="desplegable ml-4 hidden">
                            <li>
                                <a href="#" class="block p-2 hover:bg-blue-400 flex items-center rounded-lg">
                                    Tratamientos
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 hover:bg-blue-400 flex items-center rounded-lg">
                                    Gastos
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 hover:bg-blue-400 flex items-center rounded-lg">
                                    Facturas
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-blue-400 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                <span>Informes</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                        <ul class="desplegable ml-4 hidden">
                            <li>
                                <a href="#" class="block p-2 hover:bg-blue-400 flex items-center rounded-lg">
                                    Presupuestos
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 hover:bg-blue-400 flex items-center rounded-lg">
                                    Informe médico
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-blue-400 cursor-pointer rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-file-alt mr-2"></i>
                                <span>Documentación</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                        <ul class="desplegable ml-4 hidden">
                            <li>
                                <a href="#" class="block p-2 hover:bg-blue-400 flex items-center rounded-lg">
                                    Firmas pendientes
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 hover:bg-blue-400 flex items-center rounded-lg">
                                    Documentos
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="w-full">
            <div class="flex">
                <div class="bg-blue-500 w-2/6 m-5 rounded-xl">
                    <p class="text-center p-5 text-white  text-xl">Abonnement</p>
                </div>
                <div class="bg-blue-500 w-2/6 m-5 rounded-xl">
                    <p class="text-center p-5 text-white  text-xl">Kinderen</p>
                </div>
                <div class="bg-blue-500 w-2/6 m-5 rounded-xl">
                    <p class="text-center p-5 text-white  text-xl">Feedback</p>
                </div>
            </div>
            <div class="flex">
                <div class="bg-white w-2/6 m-5 p-5 h-24 rounded-3xl">
                    <p>test</p>
                </div>
                @foreach ($leerlingen as $leerling)
                    <div class="bg-white w-2/6 m-5 p-5 h-24 rounded-3xl">
                        <div class="">
                            <h3 class="text-xl font-semibold">{{ $leerling->voornaam }} {{ $leerling->achternaam }}
                            </h3>
                            <p class="text-gray-600 ">{{ $leerling->groep->groepNaam }}</p>
                        </div>
                    </div>
                @endforeach
                @foreach ($leerling->feedback as $fb)
                    <div class="bg-white w-2/6 m-5 rounded-3xl p-5">
                        <div
                            class="relative flex items-center gap-4 pt-0 pb-8 mx-0 mt-4 overflow-hidden text-gray-700 bg-transparent shadow-none rounded-xl bg-clip-border">
                            <div class="flex w-full flex-col gap-0.5">
                                <div class="flex items-center justify-between">
                                    <h5
                                        class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                        {{ $fb->zwemDocent->voornaam }} {{ $fb->zwemDocent->achternaam }}
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
                            <p class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                {{ $fb->content }}
                            </p>
                        </div>
                    </div>
                @endforeach
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
