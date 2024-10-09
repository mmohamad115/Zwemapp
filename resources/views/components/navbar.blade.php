<nav class="flex bg-white text-gray-950 ml-16 absolute w-full rounded-b-xl z-50">
    <div class="px-5 xl:px-12 flex w-full items-center">
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
                <form method="POST" action="{{ route('logout') }}" class="items-center">
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
