<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Import\GuruImport;
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
        $gurus = Guru::with('mapel')->get(); // Eager load mapel
        return view('wakasek.dataGuru.index', compact('gurus'));
    }
    

    public function create()
    {
        $mapels = Mapel::all(); // Ambil semua data mata pelajaran
        return view('wakasek.dataGuru.create', compact('mapels'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:gurus',
            'password' => 'required|string|min:8',
            'mapel_id' => 'required|exists:mapels,id',
        ]);
    
    
        $guru = Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => $request->password,
            'mapel_id' => $request->mapel_id,
        ]);
    
        User::create([
            'name' => $guru->nama,
            'nis' => $guru->nip,
            'mapel_id' => $request->mapel_id,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);
    
        return redirect()->route('wakasek.dataGuru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }
    

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $mapels = Mapel::all(); // Ambil semua mata pelajaran
        return view('wakasek.dataGuru.edit', compact('guru', 'mapels'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => "required|string|max:255|unique:gurus,nip,{$guru->id}",
            'mapel_id' => 'required|exists:mapels,id',
            'password' => 'nullable|string|min:8', // Password opsional saat update
        ]);
    
        // Perbarui data guru
        $guru->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'mapel_id' => $request->mapel_id,
            'password' => $request->password ? Hash::make($request->password) : $guru->password,
        ]);
    
        // Update data user
        $user = User::where('nis', $guru->nip)->first();
        if ($user) {
            $user->update([
                'name' => $guru->nama,
                'mapel_id' => $request->mapel_id,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);
        }
    
        return redirect()->route('wakasek.dataGuru.index')->with('success', 'Data guru berhasil diperbarui!');
    }
    

    public function destroy(Guru $guru)
    {
        $user = User::where('nis', $guru->nip)->first();
        if ($user) {
            $user->delete();
        }

        $guru->delete();

        return redirect()->route('wakasek.dataGuru.index')->with('success', 'Data guru berhasil dihapus!');
    }

    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv'
        ]);

        // Import the data from the file
        Excel::import(new ImportsGuruImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

}
