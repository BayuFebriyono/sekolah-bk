<?php

namespace App\Http\Controllers\Admin;

use App\Models\GuruBk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;

class GuruBkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        $bk = GuruBk::all();

        return view('admin.bk.list', [
            'guru' => $guru,
            'bk' => $bk
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
                'bk' => true
            ]);

        GuruBk::create($validatedData);
        return back()->with('success', 'Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuruBk  $guruBk
     * @return \Illuminate\Http\Response
     */
    public function show(GuruBk $guruBk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuruBk  $guruBk
     * @return \Illuminate\Http\Response
     */
    public function edit(GuruBk $guruBk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuruBk  $guruBk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuruBk $guruBk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuruBk  $guruBk
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuruBk $admin_bk)
    {
        Guru::where('id', $admin_bk->guru_id)
            ->update([
                'bk' => false
            ]);
        GuruBk::where('id', $admin_bk->id)->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
