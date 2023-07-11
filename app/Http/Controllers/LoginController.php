<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nip' => ['required'],
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
            'nomor_induk' => ['required'],
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

    // Function VIew Guru Ganti Password
    public function viewGuru(Request $request)
    {
        return view('admin.ganti_pass');
    }

    public function viewBk()
    {
        return view('bk.ganti_pass');
    }

    public function viewSiswa()
    {
        return view('siswa.ganti_pass');
    }

    // Function Ubah Password Guru
    public function ubahGuru(Request $request)
    {
        $password_sekarang = Auth::guard('guru')->user()->password;
        $pass_lama = $request->password_lama;
        $pass_baru = $request->password;


        if (Hash::check($pass_lama, $password_sekarang)) {
            Guru::where('id', auth()->guard('guru')->user()->id)
                ->update([
                    'password' => bcrypt($pass_baru)
                ]);
            return back()->with('success', 'Password Berhasil dirubah');
        } else {
            return back()->with('error', 'Password Lama Salah');
        }
    }

    public function ubahSiswa(Request $request)
    {
        $password_sekarang = Auth::guard('siswa')->user()->password;
        $pass_lama = $request->password_lama;
        $pass_baru = $request->password;


        if (Hash::check($pass_lama, $password_sekarang)) {
            Siswa::where('id', auth()->guard('siswa')->user()->id)
                ->update([
                    'password' => bcrypt($pass_baru)
                ]);
            return back()->with('success', 'Password Berhasil dirubah');
        } else {
            return back()->with('error', 'Password Lama Salah');
        }
    }
}
