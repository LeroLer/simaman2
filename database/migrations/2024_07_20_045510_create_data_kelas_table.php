<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_kelas', function (Blueprint $table) {
            $table->string('kode_kelas')->primary();
            $table->string('kelas');
            $table->string('nip');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('nip')->references('nip')->on('data_gurus');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_kelas');
    }
};
