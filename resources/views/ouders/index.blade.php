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
    <nav class="bg-blue-500 p-4 flex items-center justify-between">
        <div>
            <h1 class="text-white text-xl font-semibold">Welkom</h1>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-white">{{ auth()->user()->name }}</span>
            <i class="fas fa-user-circle text-white text-2xl"></i>
        </div>
    </nav>

    <!-- Contenedor principal flex -->
    <div class="flex">
        <!-- Navegación lateral -->
        <aside class="bg-gray-800 text-white w-64 h-screen p-4 overflow-y-auto">
            <nav>
                <ul class="space-y-2">
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 cursor-pointer">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                <span>Agenda</span>
                            </div>
                            {{-- <i class="fas fa-chevron-down text-xs"></i> --}}
                        </div>
                        {{-- <ul class="desplegable ml-4 hidden">
                            <li>
                                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Gestion de citas
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Polizas
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 cursor-pointer">
                            <div class="flex items-center">
                                <i class="fas fa-money-bill-wave mr-2"></i>
                                <span>Contabilidad</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                        <ul class="desplegable ml-4 hidden">
                            <li>
                                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Tratamientos
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Gastos
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Facturas
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 cursor-pointer">
                            <div class="flex items-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                <span>Informes</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                        <ul class="desplegable ml-4 hidden">
                            <li>
                                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Presupuestos
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Informe médico
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="opcion-con-desplegable">
                        <div class="flex items-center justify-between p-2 hover:bg-gray-700 cursor-pointer">
                            <div class="flex items-center">
                                <i class="fas fa-file-alt mr-2"></i>
                                <span>Documentación</span>
                            </div>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                        <ul class="desplegable ml-4 hidden">
                            <li>
                                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Firmas pendientes
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block p-2 hover:bg-gray-700 flex items-center">
                                    <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                    Documentos
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
{{-- 
        <!-- Contenido principal -->
        <main class="flex-1 p-6">
            <!-- Aquí puedes agregar el contenido principal de tu página -->
            <h1 class="text-2xl font-bold mb-4">¡Bienvenido al CRM de Mi Empresa!</h1>
            <p>En esta sección encontrarás todo lo que necesitas para administrar tus clientes y ventas de manera eficiente.</p>
        </main> --}}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener todas las opciones principales con desplegables
            const opcionesConDesplegable = document.querySelectorAll(".opcion-con-desplegable");

            // Agregar evento de clic a cada opción principal
            opcionesConDesplegable.forEach(function(opcion) {
                opcion.addEventListener("click", function() {
                    // Obtener el desplegable asociado a la opción
                    const desplegable = opcion.querySelector(".desplegable");

                    // Alternar la clase "hidden" para mostrar u ocultar el desplegable
                    desplegable.classList.toggle("hidden");
                });
            });
        });
    </script>
</body>

</html>
