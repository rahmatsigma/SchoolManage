<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Data Kelas') }}
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

                <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <x-input-label for="nama_kelas" :value="__('Nama Kelas')" class="text-gray-300" />
                        <x-text-input id="nama_kelas" name="nama_kelas" type="text" class="mt-1 block w-full bg-white/10 text-white border-white/20" :value="old('nama_kelas', $kelas->nama_kelas)" required autofocus />
                    </div>

                    <div>
                        <x-input-label for="tingkat" :value="__('Tingkat')" class="text-gray-300" />
                        <x-text-input id="tingkat" name="tingkat" type="text" class="mt-1 block w-full bg-white/10 text-white border-white/20" :value="old('tingkat', $kelas->tingkat)" required />
                    </div>
                    
                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-white/10">
                        <a href="{{ route('kelas.index') }}">
                            <x-secondary-button class="bg-white/5 border-white/10 text-gray-300 hover:bg-white/10">Batal</x-secondary-button>
                        </a>
                        <x-primary-button>
                            {{ __('Update Data') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>