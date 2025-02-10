<?php
namespace App\Imports;

use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Cari ID Mapel berdasarkan nama mapel yang ada di file Excel
        $mapel = Mapel::where('nama', $row['mapel'])->first();

        return new Guru([
            'nama'     => $row['nama'],   
            'nip'      => $row['nip'],    
            'mapel_id' => $mapel ? $mapel->id : null,  // Simpan ID mapel, bukan nama mapel
            'password' => Hash::make($row['password']),  
        ]);
    }
}
