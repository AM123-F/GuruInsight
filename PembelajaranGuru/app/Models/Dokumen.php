<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $fillable = ['judul', 'jenis_id', 'mapel_id', 'file_path', 'guru_id'];

    public function jenis()
    {
        return $this->belongsTo(JenisBlangko::class, 'jenis_id');
    }
    public function gurus()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
