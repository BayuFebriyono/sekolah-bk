<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.main.main');
    }

    public function editProfile()
    {
        $id = auth()->guard('guru')->user()->id;
        $admin = Guru::where('id', $id)->first();
        return view('admin.edit_profile', [
            'admin' => $admin
        ]);
    }

    public function updateProfile(Request $request)
    {
        $old_data = Guru::where('id', auth()->guard('guru')->user()->id)->first();
        $validatedData = $request->validate([
            'nip' => ['required',
                Rule::unique('gurus', 'nip')->where(function($q) use ($old_data){
                    $q->where('nip', '!=' , $old_data->nip);
                })
            ],
            'nama' => ['required',
                Rule::unique('gurus', 'nama')->where(function($q) use ($old_data){
                    $q->where('nama', '!=' , $old_data->nip);
                })
            ],
            'alamat' => ['required', 'min:15'],
            'jenis_kelamin' => 'required'
        ]);

        Guru::where('id', auth()->guard('guru')->user()->id)
            ->update($validatedData);

        return back()->with('success', 'Data berhasil diperbarui');
    }
}
