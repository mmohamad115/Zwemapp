<aside class="bg-cyan-400 text-white w-64 min-h-screen p-4 overflow-y-auto relative">
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
