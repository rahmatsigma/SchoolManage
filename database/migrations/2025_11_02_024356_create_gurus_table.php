<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique(); // Nomor Induk Pegawai
            $table->string('nama_lengkap');
            $table->string('jabatan'); // Misal: Guru Matematika, Wali Kelas
            $table->string('nomor_telepon')->nullable(); // Boleh kosong
            $table->text('alamat')->nullable(); // Boleh kosong
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
