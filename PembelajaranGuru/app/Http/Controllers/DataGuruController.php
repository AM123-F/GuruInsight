<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\GuruImport as ImportsGuruImport;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DataGuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::with('mapels')->get();
        return view('wakasek.dataGuru.index', compact('gurus'));
    }

    public function create()
    {
        $mapels = Mapel::all(); 
        return view('wakasek.dataGuru.create', compact('mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:gurus',
            'password' => 'required|string|min:8',
            'mapel_id' => 'required|array',
            'mapel_id.*' => 'exists:mapels,id',
        ]);

        $guru = Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
        ]);

        $guru->mapels()->attach($request->mapel_id);

        // Buat akun user untuk login
        User::create([
            'name' => $guru->nama,
            'nis' => $guru->nip,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        return redirect()->route('wakasek.dataGuru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $mapels = Mapel::all(); 
        return view('wakasek.dataGuru.edit', compact('guru', 'mapels'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => "required|string|max:255|unique:gurus,nip,{$guru->id}",
            'mapel_id' => 'required|array',
            'mapel_id.*' => 'exists:mapels,id',
            'password' => 'nullable|string|min:8',
        ]);

        $guru->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => $request->password ? Hash::make($request->password) : $guru->password,
        ]);

        $guru->mapels()->sync($request->mapel_id);

        // Update data user jika ada
        $user = User::where('nis', $guru->nip)->first();
        if ($user) {
            $user->update([
                'name' => $guru->nama,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);
        }

        return redirect()->route('wakasek.dataGuru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus akun user terkait
        User::where('nis', $guru->nip)->delete();

        // Hapus data guru
        $guru->mapels()->detach();
        $guru->delete();

        return redirect()->route('wakasek.dataGuru.index')->with('success', 'Data guru berhasil dihapus!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv'
        ]);

        Excel::import(new ImportsGuruImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
