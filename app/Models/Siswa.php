<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nis', 'nama_lengkap', 'tanggal_lahir', 'alamat', 'kelas_id'];

// Definisikan relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
