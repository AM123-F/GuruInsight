<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nama', 'nip', 'password', 'mapel_id'];


    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'guru_id', 'id');
    }
// app/Models/Guru.php
public function mapel()
{
    return $this->belongsTo(Mapel::class, 'mapel_id'); // Pastikan kolom 'mapel_id' ada di tabel 'gurus'
}

}
