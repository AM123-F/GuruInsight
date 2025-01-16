<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blangko extends Model
{
    use HasFactory;

    // Menambahkan 'judul' dan 'file_path' ke dalam fillable
    protected $fillable = ['judul', 'file_path'];
}
