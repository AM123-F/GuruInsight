<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\GuruImport;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class DataGuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('wakasek.dataGuru.index', compact('gurus'));
    }

    public function create()
    {
        return view('wakasek.dataGuru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:gurus',
            'password' => 'required|string|min:8',
        ]);

        $guru = Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => $request->password,
        ]);

        User::create([
            'name' => $guru->nama,
            'nis' => $guru->nip,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        return redirect()->route('wakasek.dataGuru.index')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit(Guru $guru)
    {
        return view('wakasek.dataGuru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => "required|string|max:255|unique:gurus,nip,{$guru->id}",
        ]);

        $guru->update($request->only('nama', 'nip'));

        $user = User::where('nis', $guru->nip)->first();
        if ($user) {
            $user->update([
                'name' => $guru->nama,
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



    // Form import data guru
    public function import()
    {
        return view('wakasek.dataGuru.import'); // Pastikan file ini ada di folder resources/views/wakasek/dataGuru
    }

    public function storeImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv', // Validasi format file
        ]);

        try {
            Excel::import(new GuruImport, $request->file('file')); // Proses import file
            return redirect()->route('wakasek.dataGuru.index')->with('success', 'Data guru berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
