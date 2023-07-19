<?php

namespace App\Http\Controllers\Admin;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.siswa.list', [
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.siswa.create');
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
            'tahun_masuk' => 'required',
            'nomor_induk' => 'required|numeric|unique:siswas,nomor_induk',
            'nama' => 'required|min:5',
            'alamat' => 'required|min:15',
            'jenis_kelamin' => 'required',
            'nama_wali' => 'required|min:5',
            'hp_siswa' => 'required|min:11|unique:siswas,hp_siswa|max:14',
            'hp_wali' => 'required|min:11|unique:siswas,hp_wali|max:14',
            'tes_diagnostik' => 'required',
        ]);

        $validatedData['password'] = bcrypt($request->nomor_induk);

        Siswa::create($validatedData);

        return back()->with('success', 'Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $admin_siswa)
    {
        return view('admin.siswa.edit', [
            'siswa' => $admin_siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin_siswa)
    {
        $old_data = Siswa::where('id', $admin_siswa)->first();
        $validatedData = $request->validate([
            'tahun_masuk' => 'required',
            'nomor_induk' => [
                'required', 'numeric',
                Rule::unique('siswas', 'nomor_induk')->where(function ($q) use ($old_data) {
                    $q->where('nomor_induk', '!=', $old_data->nomor_induk);
                })
            ],
            'nama' => 'required|min:5',
            'alamat' => 'required|min:15',
            'jenis_kelamin' => 'required',
            'nama_wali' => 'required|min:5',
            'hp_siswa' => [
                'required', 'min:11', 'max:14',
                Rule::unique('siswas', 'hp_siswa')->where(function ($q) use ($old_data) {
                    $q->where('hp_siswa', '!=', $old_data->hp_siswa);
                })
            ],
            'hp_wali' => [
                'required', 'min:11', 'max:14',
                Rule::unique('siswas', 'hp_wali')->where(function ($q) use ($old_data) {
                    $q->where('hp_wali', '!=', $old_data->hp_wali);
                })
            ],
            'tes_diagnostik' => 'required',
        ]);

        Siswa::where('id', $admin_siswa)->update($validatedData);
        return redirect()->to('/admin-siswa')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $admin_siswa)
    {
        $admin_siswa->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
