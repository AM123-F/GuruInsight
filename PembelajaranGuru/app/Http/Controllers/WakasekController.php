<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Guru; // Tambahkan ini untuk menggunakan model Guru
use Illuminate\Http\Request;

class WakasekController extends Controller
{
    public function dashboard()
    {
        // Menghitung total guru dari tabel 'gurus'
        $uploads = Dokumen::with('gurus')->get();

        // Count the number of teachers who have uploaded documents
        $teachersWithUploads = Dokumen::distinct('guru_id')->count();

        // Count the total number of teachers
        $totalTeachers = Guru::count();

        // Calculate the percentage of teachers who have uploaded documents
        $uploadPercentage = $totalTeachers > 0 ? ($teachersWithUploads / $totalTeachers) * 100 : 0;

        return view('wakasek.dashboard', compact('uploads', 'uploadPercentage', 'teachersWithUploads', 'totalTeachers'));
    }
}
