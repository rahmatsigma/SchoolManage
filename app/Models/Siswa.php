<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nis', 'nama_lengkap', 'tanggal_lahir', 'alamat', 'kelas_id'];
    protected $fillable = ['user_id', 'nis', 'nama_lengkap', 'kelas_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

// Definisikan relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

}

