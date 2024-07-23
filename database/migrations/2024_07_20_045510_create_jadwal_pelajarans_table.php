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
        Schema::create('jadwal_pelajarans', function (Blueprint $table) {
            $table->string('kode_jadwal')->primary();
            $table->string('nomor_mp');
            $table->string('kode_kelas');
            $table->string('nip');
            $table->string('hari');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->timestamps();

            //add foreign key constraint
            $table->foreign('nomor_mp')->references('nomor_mp')->on('mata_pelajarans');
            $table->foreign('kode_kelas')->references('kode_kelas')->on('data_kelas');
            $table->foreign('nip')->references('nip')->on('data_gurus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelajarans');
    }
};
