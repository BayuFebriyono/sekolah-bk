<?php

namespace App\Http\Controllers\Bk;

use App\Models\TataTertib;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa;

class TataTertibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tartib = TataTertib::all();
        return view('bk.tata_tertib.list', [
            'tartib' => $tartib
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bk.tata_tertib.create');
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
            'kategori' => 'required',
            'jenis_pelanggaran' => 'required',
            'poin' => 'required'
        ]);

        TataTertib::create($validatedData);
        return back()->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TataTertib  $tataTertib
     * @return \Illuminate\Http\Response
     */
    public function show(TataTertib $tataTertib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TataTertib  $tataTertib
     * @return \Illuminate\Http\Response
     */
    public function edit(TataTertib $bk_tartib)
    {
        return view('bk.tata_tertib.edit',[
            'tartib' => $bk_tartib
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TataTertib  $tataTertib
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TataTertib $bk_tartib)
    {
        $validatedData = $request->validate([
            'kategori' => 'required',
            'jenis_pelanggaran' => 'required',
            'poin' => 'required'
        ]);

        $bk_tartib->update($validatedData);
        return redirect()->to('/bk-tartib')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TataTertib  $tataTertib
     * @return \Illuminate\Http\Response
     */
    public function destroy(TataTertib $bk_tartib)
    {
        $bk_tartib->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
