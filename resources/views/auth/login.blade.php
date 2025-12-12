<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="text-2xl font-bold text-white text-center mb-6">Selamat Datang</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email" class="block font-medium text-sm text-gray-200">Email</label>
            <input id="email" class="block mt-1 w-full bg-white/20 border border-white/10 focus:border-blue-400 focus:ring focus:ring-blue-400/50 rounded-lg shadow-sm text-white placeholder-gray-300 px-4 py-2" 
                   type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email..." />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
        </div>

        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-200">Password</label>
            <input id="password" class="block mt-1 w-full bg-white/20 border border-white/10 focus:border-blue-400 focus:ring focus:ring-blue-400/50 rounded-lg shadow-sm text-white placeholder-gray-300 px-4 py-2" 
                   type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-500 bg-white/20 text-blue-500 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-300">{{ __('Ingat Saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-300 hover:text-white" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif

            <button type="submit" class="ms-3 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg">
                {{ __('Masuk') }}
            </button>
        </div>
    </form>
</x-guest-layout>