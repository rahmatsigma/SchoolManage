<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="mb-6 p-4 text-sm font-medium text-blue-800 bg-blue-100 rounded-lg border-l-4 border-blue-500" role="alert">
        <span class="font-bold">Halo, {{ Auth::user()->name }}!</span> Selamat datang kembali di sistem manajemen sekolah.
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b-4 border-blue-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Siswa</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalSiswa }}</p>
            </div>
            <div class="p-3 bg-blue-100 rounded-full text-blue-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b-4 border-green-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Guru</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalGuru }}</p>
            </div>
            <div class="p-3 bg-green-100 rounded-full text-green-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b-4 border-purple-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Kelas</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalKelas }}</p>
            </div>
            <div class="p-3 bg-purple-100 rounded-full text-purple-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b-4 border-red-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Mata Pelajaran</p>
                <p class="text-3xl font-bold text-gray-800">{{ $totalMapel }}</p>
            </div>
            <div class="p-3 bg-red-100 rounded-full text-red-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253m9 0c1.168.776 2.754 1.253 4.5 1.253s3.332-.477 4.5-1.253m-12 0V11a1 1 0 001 1h2a1 1 0 001-1V6.253m0 0C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253m9 0c1.168.776 2.754 1.253 4.5 1.253s3.332-.477 4.5-1.253M12 20.747V13a1 1 0 00-1-1H9a1 1 0 00-1 1v7.747m0 0C10.832 21.523 12.418 22 14.168 22s3.332-.477 4.5-1.253M12 20.747C10.832 21.523 9.246 22 7.5 22S4.168 21.523 3 20.747"></path></svg>
            </div>
        </div>
        
    </div>
    
    <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h3 class="text-lg font-semibold mb-2">Ringkasan Sistem</h3>
            <p>Saat ini terdapat <span class="font-bold text-blue-600">{{ $totalJadwal }}</span> jadwal pelajaran yang aktif di dalam sistem.</p>
        </div>
    </div>
    
</x-app-layout>