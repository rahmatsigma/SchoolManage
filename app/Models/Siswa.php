<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    // Gabungkan semua kolom di sini (HANYA SATU baris $fillable)
    protected $fillable = [
        'user_id',
        'nis',
        'nama_lengkap',
        'tanggal_lahir',
        'alamat',
        'kelas_id'
    ];

    // Relasi ke User (Akun Login)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}