<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Jadwal;

Route::get('/', function () {
    return view('welcome');
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
    Route::resource('siswa', SiswaController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('mata-pelajaran', MataPelajaranController::class);
    Route::resource('jadwal', JadwalController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('siswa', \App\Http\Controllers\SiswaController::class);
    Route::resource('kelas', \App\Http\Controllers\KelasController::class);
    Route::resource('guru', \App\Http\Controllers\GuruController::class);
    Route::resource('mata-pelajaran', \App\Http\Controllers\MataPelajaranController::class);
    Route::resource('jadwal', \App\Http\Controllers\JadwalController::class);

});

require __DIR__.'/auth.php';
