<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'jenis', 'file_path', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
}

