<?php

namespace App\Http\Controllers\Bk;

use App\Models\TindakLanjut;
use Illuminate\Http\Request;
use App\Models\RekamanTataTertib;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TindakLanjutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rek_tartib = RekamanTataTertib::with(['guru', 'siswa', 'tataTertib'])->get();
        return view('bk.tindak_lanjut.list', [
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
        //
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
            'rekaman_tata_tertib_id' => $request->rekaman_tata_tertib_id,
            'guru_id' => Auth::guard('guru')->user()->id,
            'tanggal' => now()->toDate(),
            'tindak_lanjut' => $request->tindak_lanjut,
            'hasil' => $request->hasil
        ];

        TindakLanjut::create($data);
        return back()->with('success', 'Data ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TindakLanjut  $tindakLanjut
     * @return \Illuminate\Http\Response
     */
    public function show(TindakLanjut $tindakLanjut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TindakLanjut  $tindakLanjut
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamanTataTertib $tindak_lanjut)
    {
        $list_tindak_lanjut = TindakLanjut::where('rekaman_tata_tertib_id', $tindak_lanjut->id)->get();
        return view('bk.tindak_lanjut.create', [
            'rekaman' => $tindak_lanjut,
            'tindak_lanjut' => $list_tindak_lanjut
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TindakLanjut  $tindakLanjut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TindakLanjut $tindakLanjut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TindakLanjut  $tindakLanjut
     * @return \Illuminate\Http\Response
     */
    public function destroy(TindakLanjut $tindakLanjut)
    {
        //
    }
}
