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
            Schema::create('jadwals', function (Blueprint $table) {
            $table->id();

            // Foreign Key untuk Kelas
            $table->foreignId('kelas_id')
                ->constrained('kelas') // Mengacu ke tabel 'kelas'
                ->onDelete('cascade'); // Jika kelas dihapus, jadwalnya ikut terhapus

            // Foreign Key untuk Guru
            $table->foreignId('guru_id')
                ->constrained('gurus') // Mengacu ke tabel 'gurus'
                ->onDelete('cascade');

            // Foreign Key untuk Mata Pelajaran
            $table->foreignId('mata_pelajaran_id')
                ->constrained('mata_pelajarans') // Mengacu ke tabel 'mata_pelajarans'
                ->onDelete('cascade');

            // Data Jadwalnya
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
