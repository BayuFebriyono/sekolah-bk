<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.list', [
            'kelas' => $kelas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelas.create');
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
            'tingkat' => 'required',
            'nama_kelas' => 'required|unique:kelas,nama_kelas'
        ]);

        Kelas::create($validatedData);
        return back()->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $admin_kela)
    {
        return view('admin.kelas.edit', [
            'kelas' => $admin_kela
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $admin_kela)
    {
        $old_data = Kelas::where('id', $admin_kela)->first();

        $validatedData = $request->validate([
            'tingkat' => ['required'],
            'nama_kelas' => ['required',
                Rule::unique('kelas', 'nama_kelas')->where(function($q) use ($old_data){
                    $q->where('nama_kelas', '!=' , $old_data->nama_kelas);
                })
            ]
        ]);
        Kelas::where('id', $admin_kela)->update($validatedData);
        return redirect()->to('/admin-kelas')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $admin_kela)
    {
        $admin_kela->delete();
        return back()->with('succes', 'Data berhasil dihapus');
    }
}
