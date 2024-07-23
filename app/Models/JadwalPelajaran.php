<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalPelajaran extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelajarans'; // Corrected table name
    protected $primaryKey = 'kode_jadwal';  // Menentukan primary key
    public $incrementing = false;   // Non-incrementing primary key
    protected $keyType = 'string';  // Jika primary key adalah string

    protected $fillable = ['kode_jadwal', 'nomor_mp', 'kode_kelas', 'nip', 'hari', 'waktu_mulai', 'waktu_selesai'];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(DataGuru::class, 'nip', 'nip');
    }
    public function mataPelajaran(): BelongsTo
    {
        return $this->belongsTo(MataPelajaran::class, 'nomor_mp', 'nomor_mp');
    }
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(DataKelas::class,'kode_kelas', 'kode_kelas');
    }
}
