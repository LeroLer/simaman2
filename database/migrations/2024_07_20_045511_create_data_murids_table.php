<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_murids', function (Blueprint $table) {
            $table->string('nisn')->primary();
            $table->string('nama_murid');
            $table->string('kode_kelas');
            $table->string('alamat_murid');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->timestamps();

            // add foreign key constraint
            $table->foreign('kode_kelas')->references('kode_kelas')->on('data_kelas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_murids');
    }
};
