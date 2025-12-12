<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Mata Pelajaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 overflow-hidden shadow-xl sm:rounded-2xl">
                <div class="p-6">

                    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
                        <a href="{{ route('mata-pelajaran.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 shadow-lg transition">
                            + Tambah Mapel
                        </a>
                        
                        <form action="{{ route('mata-pelajaran.index') }}" method="GET" class="w-full sm:w-auto">
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Mapel..." 
                                       class="w-full sm:w-64 bg-black/20 border border-white/10 text-white placeholder-gray-400 rounded-lg focus:ring-blue-500 focus:border-blue-500 pl-10 shadow-inner">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 text-sm text-green-200 bg-green-900/50 border border-green-500/50 rounded-lg shadow-sm" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto rounded-lg border border-white/10">
                        <table class="min-w-full divide-y divide-white/10">
                            <thead class="bg-black/20">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Kode</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nama Mata Pelajaran</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                {{-- PERBAIKAN DI SINI: $mataPelajaran diganti jadi $mapel --}}
                                @forelse ($mapel as $mp)
                                    <tr class="hover:bg-white/5 transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-300 font-mono">{{ $mp->kode_pelajaran }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-white font-medium">
                                            <div class="flex items-center">
                                                <div class="p-2 bg-blue-500/20 rounded-lg mr-3 text-blue-300">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253m9 0c1.168.776 2.754 1.253 4.5 1.253s3.332-.477 4.5-1.253m-12 0V11a1 1 0 001 1h2a1 1 0 001-1V6.253m0 0C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253m9 0c1.168.776 2.754 1.253 4.5 1.253s3.332-.477 4.5-1.253M12 20.747V13a1 1 0 00-1-1H9a1 1 0 00-1 1v7.747m0 0C10.832 21.523 12.418 22 14.168 22s3.332-.477 4.5-1.253M12 20.747C10.832 21.523 9.246 22 7.5 22S4.168 21.523 3 20.747"></path></svg>
                                                </div>
                                                {{ $mp->nama_pelajaran }}
                                            </div>
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-3">
                                                <a href="{{ route('mata-pelajaran.edit', $mp->id) }}" class="text-blue-400 hover:text-blue-300 transition">Edit</a>
                                                <form action="{{ route('mata-pelajaran.destroy', $mp->id) }}" method="POST" onsubmit="return confirm('Menghapus mapel ini mungkin akan mempengaruhi jadwal pelajaran. Yakin?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300 transition">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-8 text-center text-gray-400 italic">
                                            Data mata pelajaran belum tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{-- PERBAIKAN DI SINI JUGA --}}
                        {{ $mapel->links() }} 
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>