<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    public function model(array $row)
    {
        return new Guru([
            'nama' => $row[0],
            'nip' => $row[1],
            'role' => $row[2],
            'password' => Hash::make($row[3]),
        ]);
    }
}

