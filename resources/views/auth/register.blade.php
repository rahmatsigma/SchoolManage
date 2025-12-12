<x-guest-layout>
    <h2 class="text-2xl font-bold text-white text-center mb-6">Buat Akun Baru</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name" class="block font-medium text-sm text-gray-200">Nama Lengkap</label>
            <input id="name" class="block mt-1 w-full bg-white/20 border border-white/10 focus:border-blue-400 focus:ring focus:ring-blue-400/50 rounded-lg shadow-sm text-white placeholder-gray-400 px-4 py-2" 
                   type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama kamu" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-300" />
        </div>

        <div class="mt-4">
            <label for="email" class="block font-medium text-sm text-gray-200">Email</label>
            <input id="email" class="block mt-1 w-full bg-white/20 border border-white/10 focus:border-blue-400 focus:ring focus:ring-blue-400/50 rounded-lg shadow-sm text-white placeholder-gray-400 px-4 py-2" 
                   type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="email@contoh.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
        </div>

        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-200">Password</label>
            <input id="password" class="block mt-1 w-full bg-white/20 border border-white/10 focus:border-blue-400 focus:ring focus:ring-blue-400/50 rounded-lg shadow-sm text-white placeholder-gray-400 px-4 py-2" 
                   type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-200">Konfirmasi Password</label>
            <input id="password_confirmation" class="block mt-1 w-full bg-white/20 border border-white/10 focus:border-blue-400 focus:ring focus:ring-blue-400/50 rounded-lg shadow-sm text-white placeholder-gray-400 px-4 py-2" 
                   type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-300" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <button type="submit" class="w-full px-4 py-3 bg-blue-600 border border-transparent rounded-lg font-bold text-sm text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg">
                {{ __('Daftar') }}
            </button>
        </div>

        <div class="mt-6 text-center text-sm text-gray-400">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 font-bold">Masuk disini</a>
        </div>
    </form>
</x-guest-layout>