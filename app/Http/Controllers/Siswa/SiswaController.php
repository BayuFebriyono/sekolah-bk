<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Models\RekamanTataTertib;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $rek_tartib = RekamanTataTertib::with(['guru', 'siswa', 'tataTertib'])
            ->where('siswa_id', auth()->guard('siswa')->user()->id)
            ->get();
        return view('siswa.index.list', [
            'rek' => $rek_tartib
        ]);
    }
}
