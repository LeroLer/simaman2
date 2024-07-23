<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajarans';
    protected $primaryKey = 'nomor_mp';  // Menentukan primary key
    public $incrementing = false;        // Non-incrementing primary key
    protected $keyType = 'string';       // Jika primary key adalah string
    protected $fillable = ['nomor_mp', 'nama_mp'];

    public function dataGurus()
    {
        return $this->hasMany(DataGuru::class, 'nomor_mp', 'nomor_mp');
    }
}
