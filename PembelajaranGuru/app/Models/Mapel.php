<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels'; // Pastikan tabel sesuai dengan nama di database

    protected $fillable = ['nama']; // Tambahkan kolom yang diperbolehkan untuk mass assignment
// app/Models/Mapel.php
public function gurus()
{
    return $this->hasMany(Guru::class);
}

}
