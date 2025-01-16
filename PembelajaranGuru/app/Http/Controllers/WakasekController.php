<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru; // Tambahkan ini untuk menggunakan model Guru

class WakasekController extends Controller
{
    public function dashboard()
    {
        // Menghitung total guru dari tabel 'gurus'
        $totalGuru = Guru::count();

        // Mengirimkan data ke view
        return view('wakasek.dashboard', compact('totalGuru'));
    }
}
