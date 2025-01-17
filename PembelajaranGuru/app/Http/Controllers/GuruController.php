<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blangko;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function dashboard()
    {

        return view('guru.dashbaord');
        
    }
    public function blangko()
    {
        $blangkos = Blangko::all(); // Ambil semua data blangko dari database

        return view('guru.FormatBlangko', compact('blangkos'));
        
    }
    public function showUploadForm()
    {
        // Ambil semua dokumen yang sudah diupload
        $dokumens = Dokumen::where('guru_id', Auth::user()->id)->get();
        
        // Tampilkan halaman upload dan daftar dokumen
        return view('guru.upload-dokumen', compact('dokumens'));
    }

    // Menyimpan dokumen yang diupload oleh guru
    public function storeTugas(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,docx,xlsx|max:2048',  // Batasi file yang diizinkan
        ]);

        // Simpan file yang diupload
        $filePath = $request->file('file')->store('dokumen', 'public');

        // Simpan data dokumen ke database
        $dokumen = new Dokumen();
        $dokumen->judul = $validatedData['judul'];
        $dokumen->file_path = $filePath;
        $dokumen->guru_id = Auth::user()->id;  // Simpan ID guru yang mengupload
        $dokumen->save();

        // Redirect dengan pesan sukses
        return redirect()->route('guru.guru.guru.upload.tugas.form')->with('success', 'Dokumen berhasil diupload.');
    }
}
