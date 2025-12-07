<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;

class GuruDashboardController extends Controller
{
    public function jadwalSaya()
    {
        // 1. Ambil user yang sedang login
        $user = Auth::user();

        // 2. Cek apakah user ini terhubung ke data Guru?
        if (!$user->guru) {
            // Kalau tidak terhubung, tampilkan pesan error atau kosong
            return view('guru_dashboard.jadwal', ['jadwals' => []])
                ->with('warning', 'Akun Anda belum terhubung dengan data Guru.');
        }

        // 3. Ambil jadwal berdasarkan guru_id milik user ini
        $jadwals = Jadwal::with(['kelas', 'mataPelajaran']) // Eager load biar cepat
                    ->where('guru_id', $user->guru->id) // Filter punya dia sendiri
                    ->orderByRaw("CASE 
                        WHEN hari = 'Senin' THEN 1 
                        WHEN hari = 'Selasa' THEN 2 
                        WHEN hari = 'Rabu' THEN 3 
                        WHEN hari = 'Kamis' THEN 4 
                        WHEN hari = 'Jumat' THEN 5 
                        WHEN hari = 'Sabtu' THEN 6 
                        ELSE 7 END") // Urutkan hari
                    ->orderBy('jam_mulai')
                    ->get();

        return view('guru_dashboard.jadwal', compact('jadwals'));
    }
}