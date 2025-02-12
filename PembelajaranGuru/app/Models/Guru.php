<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guru extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nama', 'nip', 'password'];

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'guru_id', 'id');
    }

    // Mengubah relasi mapel ke many-to-many
    public function mapels(): BelongsToMany
    {
        return $this->belongsToMany(Mapel::class, 'guru_mapel', 'guru_id', 'mapel_id');
    }
    
    
}
