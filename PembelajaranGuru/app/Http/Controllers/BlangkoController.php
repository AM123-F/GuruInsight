<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blangko;

class BlangkoController extends Controller
{
    public function index()
    {
        $blangkos = Blangko::all();
        return view('wakasek.blangkos.index', compact('blangkos'));
    }

    public function create()
    {
        return view('wakasek.blangkos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        $filePath = $request->file('file')->store('blangkos', 'public');

        Blangko::create([
            'judul' => $request->judul,
            'file_path' => $filePath,
        ]);

        return redirect()->route('wakasek.wakasek.blangkos.index');
    }

    public function edit(Blangko $blangko)
    {
        return view('wakasek.blangkos.edit', compact('blangko'));
    }

    public function update(Request $request, Blangko $blangko)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);
    
        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if (file_exists(storage_path('app/public/' . $blangko->file_path))) {
                unlink(storage_path('app/public/' . $blangko->file_path));
            }
            // Store new file
            $filePath = $request->file('file')->store('blangkos', 'public');
            $blangko->file_path = $filePath;
        }
    
        $blangko->judul = $request->judul;
        $blangko->save();
    
        return redirect()->route('wakasek.wakasek.blangkos.index');
    }
    
    public function destroy(Blangko $blangko)
    {
        // Delete the file from storage
        if (file_exists(storage_path('app/public/' . $blangko->file_path))) {
            unlink(storage_path('app/public/' . $blangko->file_path));
        }

        $blangko->delete();
        return redirect()->route('wakasek.wakasek.blangkos.index');
    }
}
