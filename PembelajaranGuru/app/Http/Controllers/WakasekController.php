<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WakasekController extends Controller
{
    public function dashboard()
    {
        return view('wakasek.dashboard');
        
    }
}
