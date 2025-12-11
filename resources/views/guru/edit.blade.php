<x-app-layout>
    <x-slot name="header">Edit Guru</x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded-lg shadow-sm">
            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700">NIP</label>
                    <input type="text" name="nip" value="{{ $guru->nip }}" class="w-full border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ $guru->nama_lengkap }}" class="w-full border-gray-300 rounded-md" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Jabatan</label>
                    <input type="text" name="jabatan" value="{{ $guru->jabatan }}" class="w-full border-gray-300 rounded-md" required>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>