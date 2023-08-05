<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Models\RekamanTataTertib;
use App\Http\Controllers\Controller;
use App\Models\RekamanPelanggaran;

class SiswaController extends Controller
{
    public function index()
    {
        $rek_tartib = RekamanPelanggaran::with(['guru', 'siswa', 'tataTertib'])
            ->where('siswa_id', auth()->guard('siswa')->user()->id)
            ->get();

        $jumlah = $rek_tartib->map(function ($query) {
            return $query->tataTertib->poin;
        })->sum();

        return view('siswa.index.list', [
            'rek' => $rek_tartib,
            'total_poin' => $jumlah
        ]);
    }
}
