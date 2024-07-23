<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RekapNilai extends Model
{
    use HasFactory;

    protected $table = 'rekap_nilais';
    protected $primaryKey = 'nilai_id';  // Menentukan primary key
    public $incrementing = false;   // Non-incrementing primary key
    protected $keyType = 'string';  // Jika primary key adalah string
    protected $fillable = ['nilai_id', 'nisn', 'nomor_mp', 'nilai', 'semester'];

    public function murid(): BelongsTo
    {
        return $this->belongsTo(DataMurid::class, 'nisn', 'nisn');
    }
    public function mataPelajaran(): BelongsTo
    {
        return $this->belongsTo(MataPelajaran::class, 'nomor_mp', 'nomor_mp');
    }

}

