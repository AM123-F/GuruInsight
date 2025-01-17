<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Guru;

class WakasekUploadController extends Controller
{
    public function index()
    {
        $uploads = Dokumen::with('guru')->get();
    
        return view('wakasek.dataUpload', compact('uploads'));
    }
}
