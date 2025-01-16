<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuruImport;

class DataGuruController extends Controller
{
    // Menampilkan daftar guru
    public function index()
    {
        $gurus = Guru::all();
        return view('wakasek.dataGuru.index', compact('gurus'));
    }

    // Form tambah guru manual
    public function create()
    {
        return view('wakasek.dataGuru.create');
    }

    // Simpan data guru baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:gurus,nip',
            'password' => 'required|string|min:8',
        ]);

        Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('wakasek.dataGuru.index')->with('success', 'Guru berhasil ditambahkan!');
    }

    // Form edit guru
    public function edit(Guru $guru)
    {
        return view('wakasek.dataGuru.edit', compact('guru'));
    }

    // Update data guru
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:gurus,nip,' . $guru->id,
            'password' => 'nullable|string|min:8',
        ]);

        $guru->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => $request->password ? Hash::make($request->password) : $guru->password,
        ]);

        return redirect()->route('wakasek.dataGuru.index')->with('success', 'Data guru berhasil diperbarui!');
    }

    // Hapus data guru
    public function destroy(Guru $guru)
    {
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
