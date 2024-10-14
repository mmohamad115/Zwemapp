<div class="">
    <nav class="flex bg-white text-gray-950 ml-16 absolute w-11/12 rounded-b-xl z-50">
        <div class="px-5 xl:px-12  flex w-full items-center">
            <a class="text-3xl font-bold font-heading" href="/index">
                <img class="h-20 w-20" src="photos/SSClogo.png" alt="logo">
                {{-- SplashZone Swim Center --}}
            </a>
            <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                <li class="relative group">
                    <a href="{{ route('home') }}" class="hover:text-cyan-400 hover:cursor-pointer">Home</a>
                    <div
                        class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                    </div>
                </li>
                <li class="relative group">
                    <a class="hover:text-cyan-400 hover:cursor-pointer">Tijden</a>
                    <div
                        class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                    </div>
                </li>
                <li class="relative group">
                    <a class="hover:text-cyan-400 hover:cursor-pointer">Tarieven</a>
                    <div
                        class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                    </div>
                </li>
                <li class="relative group">
                    <a class="hover:text-cyan-400 hover:cursor-pointer">Contact Us</a>
                    <div
                        class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                    </div>
                </li>
            </ul>
            <div class="hidden xl:flex items-center space-x-5 items-center">
                <div class="hidden xl:flex items-center space-x-5 items-center">
                    <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                        {{-- <li><a class="hover:text-cyan-400" href="{{ route('login') }}">Login</a></li> --}}
                        @if (Route::has('login'))
                            <nav>
                                @auth
                                    @if (Auth::user()->role === 'ouder')
                                        <li class="relative group">
                                            <a class="hover:text-cyan-400 hover:cursor-pointer"
                                                href="{{ route('ouders.index') }}">
                                                Dashboard ouder
                                            </a>
                                            <div
                                                class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                                            </div>
                                        </li>
                                    @elseif (Auth::user()->role === 'zwem_docent')
                                        <li class="relative group">
                                            <a class="hover:text-cyan-400 hover:cursor-pointer"
                                                href="{{ route('profile.edit') }}">
                                                Dashboard zwemdocent
                                            </a>
                                            <div
                                                class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                                            </div>
                                        </li>
                                    @endif
                                @else
                                    <li class="relative group">
                                        <a class="hover:text-cyan-400 hover:cursor-pointer"
                                            href="{{ route('login') }}">Login</a>
                                        <div
                                            class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                                        </div>
                                    </li>
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
