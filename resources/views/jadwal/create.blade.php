<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Jadwal Baru') }}
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

                <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <x-input-label for="hari" :value="__('Hari')" class="text-gray-300" />
                        <select name="hari" id="hari" class="block mt-1 w-full bg-white/10 border border-white/20 text-white rounded-lg focus:border-blue-500 focus:ring-blue-500 [&>option]:text-gray-900">
                            <option value="">-- Pilih Hari --</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="jam_mulai" :value="__('Jam Mulai')" class="text-gray-300" />
                            <x-text-input id="jam_mulai" name="jam_mulai" type="time" class="mt-1 block w-full bg-white/10 text-white border-white/20" :value="old('jam_mulai')" required />
                        </div>
                        <div>
                            <x-input-label for="jam_selesai" :value="__('Jam Selesai')" class="text-gray-300" />
                            <x-text-input id="jam_selesai" name="jam_selesai" type="time" class="mt-1 block w-full bg-white/10 text-white border-white/20" :value="old('jam_selesai')" required />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="kelas_id" :value="__('Kelas')" class="text-gray-300" />
                        <select name="kelas_id" id="kelas_id" class="block mt-1 w-full bg-white/10 border border-white/20 text-white rounded-lg focus:border-blue-500 focus:ring-blue-500 [&>option]:text-gray-900">
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="mata_pelajaran_id" :value="__('Mata Pelajaran')" class="text-gray-300" />
                        <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="block mt-1 w-full bg-white/10 border border-white/20 text-white rounded-lg focus:border-blue-500 focus:ring-blue-500 [&>option]:text-gray-900">
                            <option value="">-- Pilih Mapel --</option>
                            @foreach ($mataPelajaran as $mp)
                                <option value="{{ $mp->id }}">{{ $mp->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="guru_id" :value="__('Guru Pengajar')" class="text-gray-300" />
                        <select name="guru_id" id="guru_id" class="block mt-1 w-full bg-white/10 border border-white/20 text-white rounded-lg focus:border-blue-500 focus:ring-blue-500 [&>option]:text-gray-900">
                            <option value="">-- Pilih Guru --</option>
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-white/10">
                        <a href="{{ route('jadwal.index') }}">
                            <x-secondary-button class="bg-white/5 border-white/10 text-gray-300 hover:bg-white/10">Batal</x-secondary-button>
                        </a>
                        <x-primary-button>
                            {{ __('Simpan Jadwal') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>