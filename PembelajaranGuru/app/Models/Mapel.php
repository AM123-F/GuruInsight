<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels'; 

    protected $fillable = ['nama', 'logo'];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'mapel_id', 'id');
    }

    // Mengubah relasi guru ke many-to-many
    public function gurus(): BelongsToMany
    {
        return $this->belongsToMany(Guru::class, 'guru_mapel', 'mapel_id', 'guru_id');
    }
}
