<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blangko extends Model
{
    protected $fillable = ['jenis_id', 'file_path'];

    public function jenis()
    {
        return $this->belongsTo(JenisBlangko::class, 'jenis_id');
    }
}

