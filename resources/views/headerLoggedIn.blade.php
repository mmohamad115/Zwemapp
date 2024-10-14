<div class="">
    <nav id="navbar" class="flex bg-white text-gray-950 fixed top-0 w-full z-50 transition-all duration-300">
        <div class="px-5 xl:px-12 flex w-full items-center">
            <a class="text-3xl font-bold font-heading">
                <img class="h-20 w-20 ml-16" src="{{ asset('photos/SSClogo.png') }}" alt="logo">
                {{-- SplashZone Swim Center --}}
            </a>
            <ul class="flex px-4 mx-auto font-semibold font-heading space-x-12 relative">
                <li class="relative group">
                    @if (Route::has('login'))
                        <nav>
                            @auth
                                @if (Auth::user()->role === 'ouder')
                                    <a href="{{ route('ouders.index') }}"
                                        class="hover:text-cyan-400 hover:cursor-pointer">Dashboard</a>
                                    <div
                                        class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                                    </div>
                                @elseif (Auth::user()->role === 'zwem_docent')
                                    <a href="{{ route('profile.edit') }}"
                                        class="hover:text-cyan-400 hover:cursor-pointer">Dashboard</a>
                                    <div
                                        class="absolute left-0 right-0 h-0.5 bg-cyan-400 scale-x-0 transition-transform duration-300 origin-center group-hover:scale-x-100">
                                    </div>
                                @endif
                            @else
                            @endauth
                        </nav>
                    @endif
                </li>
                <li class="relative group">
                    <a href="{{ route('home') }}" class="hover:text-cyan-400 hover:cursor-pointer">Home</a>
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
            <div class="flex items-center space-x-5 mr-14">
                <div class="flex items-center space-x-2">
                    <span class="text-gray-900">{{ auth()->user()->name }}</span>
                    <i class="fas fa-user-circle text-gray-900 text-2xl"></i>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="relative group">
                    @csrf
                    <button type="submit" id="logoutButton"
                        class="relative flex items-center  text-white  rounded-lg transition-all duration-300">
                        <i id="logoutIcon"
                            class="fas fa-sign-out-alt text-xs relative z-20 transition-all duration-300 ease-in-out left-2 group-hover:left-24 text-red-900"></i>
                        <span id="logoutText"
                            class="relative z-10 text-red-900 bg-red-600 px-2 py-1 font-semibold ml-2 rounded-md">Logout</span>
                        <span id="logoutbg"
                            class="absolute right-16 top-0 h-full w-6 bg-red-600 rounded-l-md transition-all ease-in-out duration-300 group-hover:w-0"></span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <div class="h-20"></div>
</div>

<script>
    const logoutIcon = document.getElementById('logoutIcon');
    const logoutText = document.getElementById('logoutText');
    const logoutbg = document.getElementById('logoutbg');

    logoutbg.addEventListener('mouseenter', () => {
        logoutIcon.classList.add('opacity-0');
    });

    logoutIcon.addEventListener('mouseenter', () => {
        logoutIcon.classList.add('opacity-0');
    });

    logoutbg.addEventListener('mouseleave', () => {
        logoutIcon.classList.remove('opacity-0');
    });

    logoutIcon.addEventListener('mouseleave', () => {
        logoutIcon.classList.remove('opacity-0');
    });

    logoutText.addEventListener('mouseenter', () => {
        logoutIcon.classList.add('opacity-0');
        logoutbg.classList.add('opacity-0');
    });

    logoutText.addEventListener('mouseleave', () => {
        logoutIcon.classList.remove('opacity-0');
        logoutbg.classList.remove('opacity-0');
    });

    window.onscroll = function() {
        stickyNavbar();
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function stickyNavbar() {
        if (window.pageYOffset > 0) {
            navbar.classList.add('backdrop-blur-md', 'bg-white/50', 'shadow-sm');
        } else {
            navbar.classList.remove('backdrop-blur-md', 'bg-white/50', 'shadow-sm');
        }
    }
</script>
