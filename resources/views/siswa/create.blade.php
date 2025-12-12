<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Data Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 overflow-hidden shadow-xl sm:rounded-2xl p-8">
                
                <form method="POST" action="{{ route('siswa.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="nis" :value="__('NIS')" class="text-gray-300" />
                        <x-text-input id="nis" class="block mt-1 w-full" type="text" name="nis" :value="old('nis')" required autofocus />
                        <x-input-error :messages="$errors->get('nis')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" class="text-gray-300" />
                        <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required />
                        <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="kelas_id" :value="__('Kelas')" class="text-gray-300" />
                        <select name="kelas_id" id="kelas_id" class="block mt-1 w-full bg-white/10 border border-white/20 text-white rounded-lg focus:border-blue-500 focus:ring-blue-500">
                            <option value="" class="text-gray-800">-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" class="text-gray-800">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('kelas_id')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4 gap-3">
                        <a href="{{ route('siswa.index') }}">
                            <x-secondary-button>Batal</x-secondary-button>
                        </a>
                        <x-primary-button>Simpan Data</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>