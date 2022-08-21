<?php

namespace App\Http\Controllers;

use App\Models\RekamanTataTertib;
use Illuminate\Http\Request;

class RekamanTartibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rek_tartib = RekamanTataTertib::with(['guru', 'siswa', 'tataTertib'])->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamanTataTertib  $rekamanTataTertib
     * @return \Illuminate\Http\Response
     */
    public function show(RekamanTataTertib $rekamanTataTertib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamanTataTertib  $rekamanTataTertib
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamanTataTertib $rekamanTataTertib)
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
    public function update(Request $request, RekamanTataTertib $rekamanTataTertib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamanTataTertib  $rekamanTataTertib
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamanTataTertib $rekamanTataTertib)
    {
        //
    }
}
