<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nama' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('guru')->attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::guard('guru')->user()->admin) {
                return redirect()->intended('/admin-dashboard');
            } else if (Auth::guard('guru')->user()->bk) {
                return redirect()->intended('/bk-dashboard');
            }
        } else {
            return back()->with('error', 'Email Atau Password Salah');
        }
    }

    public function siswaLogin(Request $request)
    {
        $credentials = $request->validate([
            'nama' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/siswa-dashboard');
        }

        return back()->with('error', 'Email Atau Password Salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('guru')->logout();
        Auth::guard('siswa')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
}
