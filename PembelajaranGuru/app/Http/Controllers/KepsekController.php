<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KepsekController extends Controller
{
    public function kepsek()
    {
        return view('kepsek.dashboard'); 
    }

}
