<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBlangko extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function blangkos()
    {
        return $this->hasMany(Blangko::class, 'jenis_id');
    }
}