<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Overview') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 p-6 bg-gradient-to-r from-blue-600/40 to-purple-600/40 backdrop-blur-md rounded-2xl border border-white/20 shadow-lg text-white flex items-center justify-between">
                <div>
                    <h3 class="text-2xl font-bold">Halo, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-blue-100 mt-1">Selamat datang kembali di Panel Admin SchoolManage.</p>
                </div>
                <div class="hidden md:block p-3 bg-white/10 rounded-full">
                   <span class="text-2xl">🎓</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="group relative overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 hover:scale-105 shadow-xl">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-500/20 rounded-full blur-2xl group-hover:bg-blue-500/40 transition"></div>
                    <div class="relative z-10 flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-300 uppercase tracking-wider">Total Siswa</p>
                            <h4 class="text-4xl font-extrabold text-white mt-2">{{ $totalSiswa }}</h4>
                        </div>
                        <div class="p-3 bg-blue-500/20 rounded-xl text-blue-300 border border-blue-500/30">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 text-xs text-gray-400">Data siswa aktif terbaru</div>
                </div>

                <div class="group relative overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 hover:scale-105 shadow-xl">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-500/20 rounded-full blur-2xl group-hover:bg-green-500/40 transition"></div>
                    <div class="relative z-10 flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-300 uppercase tracking-wider">Total Guru</p>
                            <h4 class="text-4xl font-extrabold text-white mt-2">{{ $totalGuru }}</h4>
                        </div>
                        <div class="p-3 bg-green-500/20 rounded-xl text-green-300 border border-green-500/30">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 text-xs text-gray-400">Tenaga pengajar terdaftar</div>
                </div>

                <div class="group relative overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 hover:scale-105 shadow-xl">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-purple-500/20 rounded-full blur-2xl group-hover:bg-purple-500/40 transition"></div>
                    <div class="relative z-10 flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-300 uppercase tracking-wider">Total Kelas</p>
                            <h4 class="text-4xl font-extrabold text-white mt-2">{{ $totalKelas }}</h4>
                        </div>
                        <div class="p-3 bg-purple-500/20 rounded-xl text-purple-300 border border-purple-500/30">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 text-xs text-gray-400">Ruang kelas aktif</div>
                </div>

                <div class="group relative overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-all duration-300 hover:scale-105 shadow-xl">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-red-500/20 rounded-full blur-2xl group-hover:bg-red-500/40 transition"></div>
                    <div class="relative z-10 flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-300 uppercase tracking-wider">Mata Pelajaran</p>
                            <h4 class="text-4xl font-extrabold text-white mt-2">{{ $totalMapel }}</h4>
                        </div>
                        <div class="p-3 bg-red-500/20 rounded-xl text-red-300 border border-red-500/30">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253m9 0c1.168.776 2.754 1.253 4.5 1.253s3.332-.477 4.5-1.253m-12 0V11a1 1 0 001 1h2a1 1 0 001-1V6.253m0 0C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253m9 0c1.168.776 2.754 1.253 4.5 1.253s3.332-.477 4.5-1.253M12 20.747V13a1 1 0 00-1-1H9a1 1 0 00-1 1v7.747m0 0C10.832 21.523 12.418 22 14.168 22s3.332-.477 4.5-1.253M12 20.747C10.832 21.523 9.246 22 7.5 22S4.168 21.523 3 20.747"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 text-xs text-gray-400">Kurikulum berjalan</div>
                </div>

            </div>

            <div class="mt-8 bg-white/10 backdrop-blur-md border border-white/20 overflow-hidden shadow-lg sm:rounded-2xl">
                <div class="p-6 text-white flex items-center space-x-4">
                    <div class="p-3 bg-yellow-500/20 rounded-full text-yellow-300">
                         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Ringkasan Sistem</h3>
                        <p class="text-gray-300 text-sm">Saat ini terdapat <span class="font-bold text-yellow-300 text-base">{{ $totalJadwal }}</span> jadwal pelajaran yang aktif di dalam sistem.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>