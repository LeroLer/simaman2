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
        Schema::create('data_gurus', function (Blueprint $table) {
            $table->string('nip')->primary();
            $table->string('nama_guru');
            $table->string('nomor_mp');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('nomor_mp')->references('nomor_mp')->on('mata_pelajarans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_gurus');
    }
};
