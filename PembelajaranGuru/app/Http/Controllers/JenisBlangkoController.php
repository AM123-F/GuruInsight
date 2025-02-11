<?php
namespace App\Http\Controllers;

use App\Models\JenisBlangko;
use Illuminate\Http\Request;

class JenisBlangkoController extends Controller
{
    public function index() {
        $jenis_blangkos = JenisBlangko::all();
        return view('wakasek.jenisBlangko.index', compact('jenis_blangkos'));
    }

    public function create() {
        return view('wakasek.jenisBlangko.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        JenisBlangko::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenis_blangko.index')->with('success', 'Jenis Blangko berhasil ditambahkan!');
    }

    public function edit(JenisBlangko $jenisBlangko) {
        return view('wakasek.jenisBlangko.edit', compact('jenisBlangko'));
    }

    public function update(Request $request, JenisBlangko $jenisBlangko) {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenisBlangko->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('jenis_blangko.index')->with('success', 'Jenis Blangko berhasil diperbarui!');
    }

    public function destroy(JenisBlangko $jenisBlangko) {
        $jenisBlangko->delete();
        return redirect()->route('jenis_blangko.index')->with('success', 'Jenis Blangko berhasil dihapus!');
    }
}
