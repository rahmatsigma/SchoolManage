<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pelajaran',
        'nama_pelajaran',
    ];

    // <-- TARUH DI SINI
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}