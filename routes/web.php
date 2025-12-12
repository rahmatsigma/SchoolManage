<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\GuruDashboardController;
use Illuminate\Support\Facades\Route;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Jadwal;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalSiswa' => Siswa::count(),
        'totalGuru' => Guru::count(),
        'totalKelas' => Kelas::count(),
        'totalMapel' => MataPelajaran::count(),
        'totalJadwal' => Jadwal::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk Guru
    Route::middleware('role:guru')->group(function () {
        Route::get('/jadwal-saya', [GuruDashboardController::class, 'jadwalSaya'])->name('jadwal.saya');
    });

    // Route untuk Admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('siswa', SiswaController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('guru', GuruController::class);
        Route::resource('mata-pelajaran', MataPelajaranController::class);
        Route::resource('jadwal', JadwalController::class);
    });
});


require __DIR__.'/auth.php';
