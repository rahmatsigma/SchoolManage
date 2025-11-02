<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Mata Pelajaran Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('mata-pelajaran.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="kode_pelajaran" :value="__('Kode Pelajaran (Contoh: MTK-10)')" />
                                <x-text-input id="kode_pelajaran" name="kode_pelajaran" type="text" class="mt-1 block w-full" :value="old('kode_pelajaran')" required autofocus />
                            </div>
                            <div>
                                <x-input-label for="nama_pelajaran" :value="__('Nama Mata Pelajaran')" />
                                <x-text-input id="nama_pelajaran" name="nama_pelajaran" type="text" class="mt-1 block w-full" :value="old('nama_pelajaran')" required />
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-primary-button>
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>