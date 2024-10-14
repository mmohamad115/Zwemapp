    <nav class="flex bg-white text-gray-950 ml-16 absolute w-11/12 rounded-b-xl z-50">
        <div class="px-5 xl:px-12  flex w-full items-center">
            <a class="text-3xl font-bold font-heading">
                <img class="h-20 w-20" src="photos/SSClogo.png" alt="logo">
                {{-- SplashZone Swim Center --}}
            </a>
            <!-- Nav Links -->
            <ul class="hidden md:flex mx-auto pr-20 font-semibold font-heading space-x-12">
                <li><a class="">Login</a></li>
            </ul>
        </div>
    </nav>


    <x-guest-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />


        <form method="POST" action="{{ route('login') }}">
            @csrf



            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

    <footer class="bg-white mt-24">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="/index"
                class="hover:underline">SplashZone Swim Center™</a>. All Rights
            Reserved.</span>
        </div>
    </footer>
