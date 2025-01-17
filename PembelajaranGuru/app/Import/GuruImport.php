<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        // Validasi agar NIS tidak kosong
        if (empty($row[0])) {
            return null;
        }
    
        return new User([
            'nis' => $row[0], // Kolom NIS
            'name' => $row[1], // Nama siswa
            'password' => Hash::make($row[4]), // Password siswa
        ]);
    }    
}