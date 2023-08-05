<?php

namespace App\Http\Controllers\Bk;

use App\Models\Siswa;
use App\Models\TataTertib;
use Illuminate\Http\Request;
use App\Models\RekamanPelanggaran;
use App\Http\Controllers\Controller;


class RekamanPelanggaranController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rek_tartib = RekamanPelanggaran::with(['guru', 'siswa', 'tataTertib'])->get();
        return view('bk.rekaman_tartib.list', [
            'rek' => $rek_tartib
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tatatertib = TataTertib::all();
        $siswa = Siswa::all();
        return view('bk.rekaman_tartib.create', [
            'tata_tertib' => $tatatertib,
            'siswa' => $siswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'guru_id' => auth()->guard('guru')->user()->id,
            'tata_tertib_id' => $request->tata_tertib_id,
            'siswa_id' => $request->siswa_id,
            'tahun_pelajaran' => $request->tahun_pelajaran,
            'tanggal' => now()->toDate()
        ];

        RekamanPelanggaran::create($data);
        return back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamanTataTertib  $rekamanTataTertib
     * @return \Illuminate\Http\Response
     */
    public function show(RekamanPelanggaran $rekamanTataTertib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamanTataTertib  $rekamanTataTertib
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamanPelanggaran $rekamanTataTertib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamanTataTertib  $rekamanTataTertib
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamanPelanggaran $rekamanTataTertib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamanTataTertib  $rekamanTataTertib
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamanPelanggaran $rekamanTataTertib)
    {
        //
    }
}
