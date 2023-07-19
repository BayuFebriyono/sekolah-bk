<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        return view('admin.guru.list', [
            'guru' => $guru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|numeric|min:4|unique:gurus,nip',
            'nama' => 'required|min:5',
            'alamat' => 'required|min:15',
            'jenis_kelamin' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->nip);

        Guru::create($validatedData);
        return back()->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $admin_guru)
    {
        return view('admin.guru.edit', [
            'guru' => $admin_guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin_guru)
    {
        $old_data = Guru::where('id', $admin_guru)->first();

        $validatedData = $request->validate([
            // 'nip' => 'required|numeric|min:4|unique:gurus,nip',
            'nip' => [
                'required', 'numeric', 'min:4',
                Rule::unique('gurus', 'nip')->where(function ($q) use ($old_data) {
                    $q->where('nip', '!=', $old_data->nip);
                })
            ],
            'nama' => 'required|min:5',
            'alamat' => 'required|min:15',
            'jenis_kelamin' => 'required'
        ]);

        Guru::where('id', $admin_guru)->update($validatedData);
        return redirect()->to('/admin-guru')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $admin_guru)
    {
        $admin_guru->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
