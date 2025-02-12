<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blangko;
use App\Models\Dokumen;
use App\Models\JenisBlangko;
use App\Models\Mapel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class GuruController extends Controller
{
    public function dashboard()
    {

        return view('guru.dashboard');
        
    }
    public function blangko(Request $request)
    {
        $jenisOptions = [
            'Silabus',
            'Rencana Pelaksanaan Pembelajaran',
            'Program Tahunan dan Program Semester',
            'Kalender Pendidikan',
            'Rincian Minggu Efektif',
            'Jadwal Mengajar dan Jadwal Pelajaran',
            'Kriteria Ketuntasan Minimal',
            'Daftar Penilaian Pembelajaran',
            'Lembar Kegiatan Siswa',
            'Instrumen Evaluasi atau Hasil Tes Belajar'
        ];
    
        $query = Blangko::query();
    
        // Filter berdasarkan jenis
        if ($request->has('filter_jenis') && !empty($request->filter_jenis)) {
            $query->where('jenis', $request->filter_jenis);
        }
    
        // Pencarian berdasarkan judul atau file
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('file_path', 'like', '%' . $request->search . '%');
            });
        }
    
        $blangkos = $query->get();
    
        return view('guru.FormatBlangko', compact('blangkos', 'jenisOptions'));
    }
    
    
    public function showUploadForm()
    {
        $jenisOptions = JenisBlangko::all(); // Ambil dari database
        $dokumens = Dokumen::where('guru_id', Auth::id())->get();       
        return view('guru.upload-dokumen', compact('jenisOptions','dokumens'));
    }

    // Menyimpan dokumen yang diupload oleh guru
    public function storeTugas(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255', // Tambahkan validasi judul
            'jenis' => 'required|string|max:100',
            'file' => 'required|file|mimes:pdf,docx,xlsx|max:5000',
        ]);
    
        $filePath = $request->file('file')->store('dokumen', 'public');
    
        Dokumen::create([
            'judul' => $validatedData['judul'], // Simpan judul
            'jenis' => $validatedData['jenis'],
            'file_path' => $filePath,
            'guru_id' => Auth::id(),
            'created_at' => Carbon::now('Asia/Jakarta'),
        ]);
    
        return redirect()->route('guru.guru.guru.upload.tugas.form')->with('success', 'Dokumen berhasil diupload.');
    }
    public function destroy($id)
{
    $dokumen = Dokumen::findOrFail($id);

    // Hapus file dari storage
    Storage::delete($dokumen->file_path);

    // Hapus data dari database
    $dokumen->delete();

    return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
}
    
    
}
