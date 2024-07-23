<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    use HasFactory;

    protected $table = 'data_gurus';
    protected $primaryKey = 'nip';  // Menentukan primary key
    public $incrementing = false;   // Non-incrementing primary key
    protected $keyType = 'string';  // Jika primary key adalah string
    protected $fillable = ['nip', 'nama_guru', 'nomor_mp'];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'nomor_mp', 'nomor_mp');
    }
}
