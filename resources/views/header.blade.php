<div class="">
    <nav class="flex bg-white text-gray-950 ml-16 absolute w-11/12 rounded-b-xl z-50">
        <div class="px-5 xl:px-12  flex w-full items-center">
            <a class="text-3xl font-bold font-heading" href="/index">
                <img class="h-20 w-20" src="photos/SSClogo.png" alt="logo">
                {{-- SplashZone Swim Center --}}
            </a>
            <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                <li><a class="hover:text-cyan-400" href="#">Home</a></li>
                <li><a class="hover:text-cyan-400" href="#">Tijden</a></li>
                <li><a class="hover:text-cyan-400" href="#">Tarieven</a></li>
                <li><a class="hover:text-cyan-400" href="#">Contact Us</a></li>
            </ul>
            <div class="hidden xl:flex items-center space-x-5 items-center">
                <div class="hidden xl:flex items-center space-x-5 items-center">
                    <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                        {{-- <li><a class="hover:text-cyan-400" href="{{ route('login') }}">Login</a></li> --}}
                        @if (Route::has('login'))
                            <nav>
                                @auth
                                    @if (Auth::user()->role === 'ouder')
                                        <a href="{{ route('ouders.index') }}" class="hover:text-cyan-400">
                                            Dashboard ouder
                                        </a>
                                    @elseif (Auth::user()->role === 'zwem_docent')
                                        <a href="{{ route('profile.edit') }}" class="hover:text-cyan-400">
                                            Dashboard zwemdocent
                                        </a>
                                    @endif
                                @else
                                    <a class="hover:text-cyan-400" href="{{ route('login') }}">Login</a>
                                @endauth
                            </nav>
                        @endif
                    </ul>
                </div>
            </div>
            <a class="xl:hidden flex mr-6 items-center" href="#">
                <span class="flex absolute -mt-5 ml-4">
                    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                    </span>
                </span>
            </a>
            <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-cyan-400" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </a>
    </nav>

</div>
