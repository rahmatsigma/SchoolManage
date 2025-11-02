<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    
    protected $fillable = ['nama_kelas', 'tingkat'];

    // Relasi ke Siswa (mungkin sudah ada)
    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
    
    // <-- TARUH DI SINI
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}