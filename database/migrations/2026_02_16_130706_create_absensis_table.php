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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwals')->onDelete('cascade'); // Pelajaran apa?
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');   // Siapa siswanya?
            $table->date('tanggal'); // Tanggal berapa?
            $table->enum('status', ['H', 'I', 'S', 'A'])->default('H'); // Status kehadiran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
