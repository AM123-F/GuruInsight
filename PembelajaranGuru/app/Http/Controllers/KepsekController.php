<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepsekController extends Controller
{
    public function kepsek()
    {
        return view('kepsek.dashboard'); 
        echo "<a href='/logout'>Logout >></a>";
    }
    public function wakasek()
    {
        return view('kasir.dashboard');
        echo "<a href='/logout'>Logout >></a>";
    }
    public function guru()
    {
        return view('owner.dashboard');
        echo "<a href='/logout'>Logout >></a>";
    }
}
