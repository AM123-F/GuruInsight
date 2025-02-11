<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

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
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update($request->all());
        return redirect()->route('wakasek.mapel.index')->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();
        return redirect()->route('wakasek.mapel.index')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
