<?php
namespace App\Http\Controllers;

use App\Models\Blangko;
use Illuminate\Http\Request;

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
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // Validasi file
        ]);

        $filePath = $request->file('file')->store('blangkos', 'public');

        Blangko::create([
            'judul' => $request->judul,
            'file_path' => $filePath,
        ]);

        return redirect()->route('wakasek.blangkos.index')->with('success', 'Blangko berhasil diunggah!');
    }
}
