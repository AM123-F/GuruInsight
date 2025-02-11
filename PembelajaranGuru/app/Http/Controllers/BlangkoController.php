<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blangko;
use App\Models\JenisBlangko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlangkoController extends Controller
{
    public function index(Request $request)
    {
        $jenisOptions = JenisBlangko::pluck('nama', 'id');
    
        $query = Blangko::with('jenis');
    
        if ($request->has('filter_jenis') && !empty($request->filter_jenis)) {
            $query->where('jenis_id', $request->filter_jenis);
        }
    
        if ($request->has('search') && !empty($request->search)) {
            $query->whereHas('jenis', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            })->orWhere('file_path', 'like', '%' . $request->search . '%');
        }
    
        $blangkos = $query->get();
    
        return view('wakasek.blangkos.index', compact('blangkos', 'jenisOptions'));
    }
    
    

    public function create()
    {
        // Jenis blangko yang tersedia
        $jenisOptions = JenisBlangko::all();

        
        return view('wakasek.blangkos.create', compact('jenisOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_id' => 'required|exists:jenis_blangkos,id',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);
    
        $filePath = $request->file('file')->store('blangkos', 'public');
    
        Blangko::create([
            'jenis_id' => $request->jenis_id,
            'file_path' => $filePath,
        ]);
    
        return redirect()->route('wakasek.wakasek.blangkos.index')->with('success', 'Blangko berhasil diunggah.');
    }
    

    public function edit(Blangko $blangko)
    {
        $jenisOptions = JenisBlangko::all(); // Mengambil semua jenis blangko dari database
    
        return view('wakasek.blangkos.edit', compact('blangko', 'jenisOptions'));
    }
    

    public function update(Request $request, Blangko $blangko)
    {
        $request->validate([
            'jenis_id' => 'required|exists:jenis_blangkos,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);
    
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($blangko->file_path);
            $filePath = $request->file('file')->store('blangkos', 'public');
            $blangko->file_path = $filePath;
        }
    
        $blangko->jenis_id = $request->jenis_id;
        $blangko->save();
    
        return redirect()->route('wakasek.blangkos.index')->with('success', 'Blangko berhasil diperbarui.');
    }
    

    public function destroy(Blangko $blangko)
    {
        Storage::disk('public')->delete($blangko->file_path);
        $blangko->delete();
        if (Blangko::count() == 0) {
            \Illuminate\Support\Facades\DB::statement('ALTER TABLE blangkos AUTO_INCREMENT = 1');
        }

        return redirect()->route('wakasek.wakasek.blangkos.index')->with('success', 'Blangko berhasil dihapus.');
    }
}
