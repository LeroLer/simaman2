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
        Schema::create('rekap_nilais', function (Blueprint $table) {
            $table->string('nilai_id')->primary();
            $table->string('nomor_mp');
            $table->string('nisn');
            $table->string('nilai');
            $table->string('semester');
            $table->timestamps();

            //add foreign key constraint
            $table->foreign('nomor_mp')->references('nomor_mp')->on('mata_pelajarans');
            $table->foreign('nisn')->references('nisn')->on('data_murids');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_nilais');
    }
};
