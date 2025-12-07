<x-app-layout>
    <x-slot name="header">
        {{ __('Jadwal Mengajar Saya') }}
    </x-slot>

    @if (session('warning'))
        <div class="mb-4 p-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg">
            {{ session('warning') }}
        </div>
    @endif

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            
            @if(count($jadwals) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hari</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jam</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mata Pelajaran</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($jadwals as $jadwal)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-700">{{ $jadwal->hari }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - 
                                    {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $jadwal->kelas->nama_kelas }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->mataPelajaran->nama_pelajaran }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-gray-500 py-8">Belum ada jadwal mengajar yang ditentukan untuk Anda.</p>
            @endif

        </div>
    </div>
</x-app-layout>