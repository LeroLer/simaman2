<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataKelas extends Model
{
    use HasFactory;

    protected $table = 'data_kelas';

    // Kolom-kolom yang bisa diisi massal
    protected $fillable = ['kode_kelas', 'kelas', 'nip'];

    // Menentukan primary key yang tidak auto-incrementing
    public $incrementing = false;
    protected $primaryKey = 'kode_kelas';
    protected $keyType = 'string';

    public function guru(): BelongsTo
    {
        return $this->belongsTo(DataGuru::class, 'nip', 'nip'); // Relasi dengan kolom 'nip'
    }
}
