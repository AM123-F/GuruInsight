<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required',
            'password' => 'required',
        ], [
            'identifier.required' => 'NIS/NIP wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'password' => $request->password,
        ];

        // Cek apakah input adalah NIS atau NIP
        $user = User::where('nis', $request->identifier)->first();
        if ($user && Auth::attempt(['nis' => $request->identifier, 'password' => $request->password])) {
            // Logic login berhasil
        }
        

        if ($user && Auth::attempt(['id' => $user->id, 'password' => $request->password])) {
            if ($user->role == 'kepsek') {
                return redirect('/kepsek/dashboard');
            } elseif ($user->role == 'wakasek') {
                return redirect('/wakasek/dashboard');
            } elseif ($user->role == 'guru') {
                return redirect('/guru');
            }
        } else {
            return redirect()
                ->back()
                ->withErrors('NIS/NIP atau password yang dimasukkan salah.')
                ->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
