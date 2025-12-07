<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-2 sm:space-y-0">
                    <a href="{{ route('kelas.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Tambah Kelas
                    </a>
                    <form action="{{ route('kelas.index') }}" method="GET" class="w-full sm:w-auto">
                        <div class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Kelas..." class="w-full sm:w-64 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm pl-10">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            </div>
                        </div>
                    </form>
                </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kelas</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tingkat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($kelas as $k)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $k->nama_kelas }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $k->tingkat }}</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('kelas.edit', $k->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                Edit
                                            </a>
                                            <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Menghapus kelas akan menghapus semua siswa di dalamnya. Yakin?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                        Data kelas belum tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $kelas->links() }} 
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>