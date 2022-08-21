<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guru;
use App\Models\Kesiswaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KesiswaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        $kesiswaan = Kesiswaan::all();

        return view('admin.kesiswaan.list', [
            'guru' => $guru,
            'kesiswaan' => $kesiswaan
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
        $validatedData = $request->validate([
            'guru_id' => 'required',
            'tahun_pelajaran' => 'required'
        ]);

        Guru::where('id', $request->guru_id)
            ->update([
                'kesiswaan' => true
            ]);

        Kesiswaan::create($validatedData);
        return back()->with('success', 'Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kesiswaan  $kesiswaan
     * @return \Illuminate\Http\Response
     */
    public function show(Kesiswaan $kesiswaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kesiswaan  $kesiswaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kesiswaan $kesiswaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kesiswaan  $kesiswaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kesiswaan $kesiswaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kesiswaan  $kesiswaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kesiswaan $admin_kesiswaan)
    {
        Guru::where('id', $admin_kesiswaan->guru_id)
            ->update([
                'kesiswaan' => false
            ]);
        Kesiswaan::where('id', $admin_kesiswaan->id)->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
