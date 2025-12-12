<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Guru Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 overflow-hidden shadow-xl sm:rounded-2xl p-8">

                @if ($errors->any())
                    <div class="mb-6 p-4 text-sm text-red-200 bg-red-900/50 border border-red-500/50 rounded-lg">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('guru.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <x-input-label for="nip" :value="__('NIP')" class="text-gray-300" />
                        <x-text-input id="nip" name="nip" type="text" class="mt-1 block w-full bg-white/10 text-white border-white/20 focus:ring-blue-500" :value="old('nip')" required autofocus placeholder="Nomor Induk Pegawai" />
                    </div>

                    <div>
                        <x-input-label for="nama_guru" :value="__('Nama Guru')" class="text-gray-300" />
                        <x-text-input id="nama_guru" name="nama_guru" type="text" class="mt-1 block w-full bg-white/10 text-white border-white/20 focus:ring-blue-500" :value="old('nama_guru')" required placeholder="Nama Lengkap Guru" />
                    </div>

                    {{-- Jika ada Dropdown Mata Pelajaran, uncomment kode dibawah ini --}}
                    {{-- 
                    <div>
                        <x-input-label for="mata_pelajaran_id" :value="__('Mata Pelajaran')" class="text-gray-300" />
                        <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="block mt-1 w-full bg-white/10 border border-white/20 text-white rounded-lg focus:border-blue-500 focus:ring-blue-500">
                            <option value="" class="text-gray-800">-- Pilih Mapel --</option>
                            @foreach ($mataPelajaran as $mp)
                                <option value="{{ $mp->id }}" class="text-gray-800">{{ $mp->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div> 
                    --}}

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-white/10">
                        <a href="{{ route('guru.index') }}">
                            <x-secondary-button class="bg-white/5 border-white/10 text-gray-300 hover:bg-white/10">Batal</x-secondary-button>
                        </a>
                        <x-primary-button>
                            {{ __('Simpan Data') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>