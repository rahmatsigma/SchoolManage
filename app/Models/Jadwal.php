<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    // TAMBAHKAN INI
    protected $fillable = [
        'kelas_id',
        'guru_id',
        'mata_pelajaran_id',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    // Relasi ke Model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke Model Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    // Relasi ke Model MataPelajaran
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }
}