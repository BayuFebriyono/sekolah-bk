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
        $rek_tartib = RekamanPelanggaran::with(['guru', 'siswa.wargaKelas.kelas', 'tataTertib'])->get();
        $siswa = Siswa::all();
        $tartib = TataTertib::all();
        return view('bk.rekaman_pelanggaran.list', [
            'no' => now()->format('y') . now()->format('m') . $this->getDataByCurrentMonth(),
            'rek' => $rek_tartib,
            'siswa' => $siswa,
            'tata_tertib' => $tartib
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
        return view('bk.rekaman_pelanggaran.create', [
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
            'no_pelanggaran' => $request->no_pelanggaran,
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
    public function edit(RekamanPelanggaran $rekaman_tartib)
    {
        return view('bk.rekaman_pelanggaran.edit', [
            'rekaman' => $rekaman_tartib,
            'siswa' => Siswa::all(),
            'tata_tertib' => TataTertib::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamanTataTertib  $rekamanTataTertib
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamanPelanggaran $rekaman_tartib)
    {
        $data = [
            'guru_id' => auth()->guard('guru')->user()->id,
            'tata_tertib_id' => $request->tata_tertib_id,
            'siswa_id' => $request->siswa_id,
        ];

        $rekaman_tartib->update($data);
        return redirect()->to('/rekaman-tartib')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamanTataTertib  $rekamanTataTertib
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamanPelanggaran $rekaman_tartib)
    {
        $rekaman_tartib->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }


    // Method getDataByCurrentMonth yang telah dibuat sebelumnya
    private function getDataByCurrentMonth()
    {
        $currentMonth = now()->format('m');
        $currentYear = now()->format('Y');

        $data = RekamanPelanggaran::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->latest()
            ->first();

        $lastThreeDigits = substr($data->no_pelanggaran, -3);

        // Ubah string menjadi angka, tambahkan 1, lalu konversi kembali ke string
        $lastThreeDigitsNumber = intval($lastThreeDigits) + 1;
        $result = str_pad($lastThreeDigitsNumber, 3, '0', STR_PAD_LEFT);

        return $result;
    }
}
