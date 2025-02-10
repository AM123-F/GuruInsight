<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blangko extends Model
{
    use HasFactory;

    protected $table = 'blangkos';
    protected $fillable = ['jenis', 'file_path'];
}
