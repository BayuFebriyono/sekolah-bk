<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $guru = Guru::where('nama', $request->nama)->first();

        if ($guru) {
            if ($guru->nip == $request->nip) {
                auth()->loginUsingId($guru->id);
                $request->session()->regenerate();
                return redirect()->intended('/admin-dashboard');
            } else {
                return back()->with('error', 'NIP SALAH');
            }
        } else {
            return back()->with('error', 'Nama Belum Terdaftar');
        }
    }
}
