<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip', 
        'nama_lengkap', 
        'jabatan', 
        'nomor_telepon', 
        'alamat'
    ];

    // <-- TARUH DI SINI
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}