<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JenisBlangko;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::all();
        return view('wakasek.mapel.index', compact('mapels'));
    }

    public function create()
    {
        return view('wakasek.mapel.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $mapel = new Mapel();
    $mapel->nama = $request->nama;

    // Jika ada upload logo
    if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('mapel_logos', 'public');
        $mapel->logo = $path;
    }

    $mapel->save();

    return redirect()->route('wakasek.mapel.index')->with('success', 'Mata Pelajaran berhasil ditambahkan!');
}

    

public function edit($id)
{
    $mapel = Mapel::findOrFail($id);
    return view('wakasek.mapel.edit', compact('mapel'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $mapel = Mapel::findOrFail($id);
    $mapel->nama = $request->nama;

    // Jika ada upload logo baru
    if ($request->hasFile('logo')) {
        // Hapus logo lama jika ada
        if ($mapel->logo) {
            \Storage::disk('public')->delete($mapel->logo);
        }
        $path = $request->file('logo')->store('mapel_logos', 'public');
        $mapel->logo = $path;
    }

    $mapel->save();

    return redirect()->route('wakasek.mapel.index')->with('success', 'Mata pelajaran berhasil diperbarui.');
}

    public function show($id)
{
    $mapel = Mapel::with('dokumen.jenis', 'dokumen.gurus')->findOrFail($id);
    $jenisBlangko = JenisBlangko::all();

    $query = $mapel->dokumen();
    if (request()->has('jenis_blangko') && request('jenis_blangko') != '') {
        $query->where('jenis_blangko_id', request('jenis_blangko'));
    }

    $dokumen = $query->get();

    return view('wakasek.mapel.show', compact('mapel', 'dokumen', 'jenisBlangko'));
}


    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();
        return redirect()->route('wakasek.mapel.index')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
