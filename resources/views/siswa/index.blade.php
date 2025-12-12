<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manajemen Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-6">

                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
                        <a href="{{ route('siswa.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 shadow-lg transition">
                            + Tambah Siswa
                        </a>

                        <form action="{{ route('siswa.index') }}" method="GET" class="w-full sm:w-auto">
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama/NIS..." 
                                       class="w-full sm:w-64 bg-black/20 border border-white/10 text-white placeholder-gray-400 rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 text-sm text-green-200 bg-green-900/50 border border-green-500/50 rounded-lg" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-white/10">
                            <thead class="bg-black/20">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">NIS</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Kelas</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @forelse ($siswa as $s)
                                    <tr class="hover:bg-white/5 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-white">{{ $s->nis }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-white font-medium">{{ $s->nama_lengkap }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $s->kelas->nama_kelas }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('siswa.edit', $s->id) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                                                <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-400">Data siswa belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $siswa->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>