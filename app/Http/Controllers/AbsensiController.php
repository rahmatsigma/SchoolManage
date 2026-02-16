<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Jadwal;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // 1. Tampilkan Form Absensi
    public function create($jadwal_id)
    {
        $jadwal = Jadwal::with(['kelas', 'mataPelajaran'])->findOrFail($jadwal_id);

        // Ambil semua siswa di kelas tersebut
        $siswas = Siswa::where('kelas_id', $jadwal->kelas_id)
                       ->orderBy('nama_lengkap')
                       ->get();

        // Cek apakah hari ini sudah absen?
        $absensiHariIni = Absensi::where('jadwal_id', $jadwal_id)
                                 ->where('tanggal', date('Y-m-d'))
                                 ->get()
                                 ->keyBy('siswa_id'); // Biar gampang dicek nanti

        return view('absensi.create', compact('jadwal', 'siswas', 'absensiHariIni'));
    }

    // 2. Simpan Data Absensi
    public function store(Request $request, $jadwal_id)
    {
        $request->validate([
            'absensi' => 'required|array', // Array status (H, I, S, A)
        ]);

        $tanggal = date('Y-m-d');

        foreach ($request->absensi as $siswa_id => $status) {
            // Update jika ada, Buat baru jika belum (Pakai updateOrCreate)
            Absensi::updateOrCreate(
                [
                    'jadwal_id' => $jadwal_id,
                    'siswa_id' => $siswa_id,
                    'tanggal' => $tanggal,
                ],
                [
                    'status' => $status
                ]
            );
        }

        return redirect()->route('jadwal.saya')->with('success', 'Absensi berhasil disimpan!');
    }
}