<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blangko;
use Illuminate\Support\Facades\Storage;

class BlangkoController extends Controller
{
    public function index(Request $request)
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
    
        // Pencarian berdasarkan jenis atau nama file
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('jenis', 'like', '%' . $request->search . '%')
                  ->orWhere('file_path', 'like', '%' . $request->search . '%');
            });
        }
    
        $blangkos = $query->get();
    
        return view('wakasek.blangkos.index', compact('blangkos', 'jenisOptions'));
    }
    

    public function create()
    {
        // Jenis blangko yang tersedia
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
        
        return view('wakasek.blangkos.create', compact('jenisOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        $filePath = $request->file('file')->store('blangkos', 'public');

        Blangko::create([
            'jenis' => $request->jenis,
            'file_path' => $filePath,
        ]);

        return redirect()->route('wakasek.wakasek.blangkos.index')->with('success', 'Blangko berhasil diunggah.');
    }

    public function edit(Blangko $blangko)
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

        return view('wakasek.blangkos.edit', compact('blangko', 'jenisOptions'));
    }

    public function update(Request $request, Blangko $blangko)
    {
        $request->validate([
            'jenis' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($blangko->file_path);
            $filePath = $request->file('file')->store('blangkos', 'public');
            $blangko->file_path = $filePath;
        }

        $blangko->jenis = $request->jenis;
        $blangko->save();

        return redirect()->route('wakasek.wakasek.blangkos.index')->with('success', 'Blangko berhasil diperbarui.');
    }

    public function destroy(Blangko $blangko)
    {
        Storage::disk('public')->delete($blangko->file_path);
        $blangko->delete();

        return redirect()->route('wakasek.wakasek.blangkos.index')->with('success', 'Blangko berhasil dihapus.');
    }
}
