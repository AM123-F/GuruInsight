<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Guru;
use App\Models\Mapel;

class WakasekUploadController extends Controller
{
    public function index()
    {
        $mapels = Mapel::with('dokumen')->get();
        
        $dokumens = Dokumen::with('gurus')->get();

        // Count the number of teachers who have uploaded documents
        $teachersWithUploads = Dokumen::distinct('guru_id')->count();

        // Count the total number of teachers
        $totalTeachers = Guru::count();

        // Calculate the percentage of teachers who have uploaded documents
        $uploadPercentage = $totalTeachers > 0 ? ($teachersWithUploads / $totalTeachers) * 100 : 0;

        return view('wakasek.dataUpload', compact('mapels','dokumens', 'uploadPercentage', 'teachersWithUploads', 'totalTeachers'));
    }
}
