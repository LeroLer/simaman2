<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataMurid extends Model
{
    use HasFactory;

    protected $table = 'data_murids';

    protected $primaryKey = 'nisn';  // Menentukan primary key
    public $incrementing = false;   // Non-incrementing primary key
    protected $keyType = 'string';  // Jika primary key adalah string
    protected $fillable = ['nisn', 'nama_murid', 'kode_kelas', 'alamat_murid','jenis_kelamin', 'no_hp'];

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(DataKelas::class, 'kode_kelas', 'kode_kelas');
    }
}
