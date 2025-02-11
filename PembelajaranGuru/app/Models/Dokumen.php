<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'jenis', 'file_path', 'guru_id'];

    public function gurus()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
    
}

