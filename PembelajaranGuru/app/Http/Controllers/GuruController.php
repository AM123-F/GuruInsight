<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blangko;
use App\Models\Dokumen;
use App\Models\Guru;
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
        $gurus = Guru::with('mapel')->get(); 
        $blangkos = Blangko::with('jenis')->get(); 
    
        return view('guru.dashboard', compact('gurus', 'blangkos'));
    }

    public function blangko(Request $request)
    {
        $jenisOptions = JenisBlangko::all();

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
        $mapels = Mapel::all(); // Ambil daftar mapel untuk dropdown
        $dokumens = Dokumen::where('guru_id', Auth::id())->get();
        
        return view('guru.upload-dokumen', compact('jenisOptions', 'mapels', 'dokumens'));
    }

    public function storeTugas(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'jenis_id' => 'required|integer|exists:jenis_blangkos,id',
            'mapel_id' => 'required|integer|exists:mapels,id',
            'file' => 'required|file|mimes:pdf,docx,xlsx|max:5000',
        ]);

        $filePath = $request->file('file')->store('dokumen', 'public');

        Dokumen::create([
            'judul' => $validatedData['judul'],
            'jenis_id' => $validatedData['jenis_id'],
            'mapel_id' => $validatedData['mapel_id'],
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
        Storage::delete('public/' . $dokumen->file_path);

        // Hapus data dari database
        $dokumen->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
