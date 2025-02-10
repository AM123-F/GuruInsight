<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Guru;

class WakasekUploadController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::with('guru')->get();

        // Count the number of teachers who have uploaded documents
        $teachersWithUploads = Dokumen::distinct('guru_id')->count();

        // Count the total number of teachers
        $totalTeachers = Guru::count();

        // Calculate the percentage of teachers who have uploaded documents
        $uploadPercentage = $totalTeachers > 0 ? ($teachersWithUploads / $totalTeachers) * 100 : 0;

        return view('wakasek.dataUpload', compact('dokumens', 'uploadPercentage', 'teachersWithUploads', 'totalTeachers'));
    }
}
