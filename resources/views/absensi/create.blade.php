<x-app-layout>
    <x-slot name="header">
        Absensi: {{ $jadwal->mataPelajaran->nama_pelajaran }} - {{ $jadwal->kelas->nama_kelas }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-bold mb-4">Tanggal: {{ date('d F Y') }}</h3>

                <form action="{{ route('absensi.store', $jadwal->id) }}" method="POST">
                    @csrf
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 mb-6">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Siswa</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Hadir</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Izin</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Sakit</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Alpa</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($siswas as $siswa)
                                @php
                                    // Cek status hari ini (kalau ada), default 'H'
                                    $status = $absensiHariIni[$siswa->id]->status ?? 'H';
                                @endphp
                                <tr>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $siswa->nama_lengkap }}</td>

                                    <td class="text-center">
                                        <input type="radio" name="absensi[{{ $siswa->id }}]" value="H" {{ $status == 'H' ? 'checked' : '' }} class="w-5 h-5 text-green-600 focus:ring-green-500">
                                    </td>
                                    <td class="text-center">
                                        <input type="radio" name="absensi[{{ $siswa->id }}]" value="I" {{ $status == 'I' ? 'checked' : '' }} class="w-5 h-5 text-yellow-500 focus:ring-yellow-400">
                                    </td>
                                    <td class="text-center">
                                        <input type="radio" name="absensi[{{ $siswa->id }}]" value="S" {{ $status == 'S' ? 'checked' : '' }} class="w-5 h-5 text-blue-500 focus:ring-blue-400">
                                    </td>
                                    <td class="text-center">
                                        <input type="radio" name="absensi[{{ $siswa->id }}]" value="A" {{ $status == 'A' ? 'checked' : '' }} class="w-5 h-5 text-red-600 focus:ring-red-500">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md">
                            Simpan Absensi
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>