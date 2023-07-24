<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa;

class ImportController extends Controller
{
    public function index()
    {
        return view('admin.import.import');
    }

    public function importSiswa(Request $request)
    {
        $filename = $request->file('excel')->getClientOriginalName();
        $file_extension = $request->file('excel')->getClientOriginalExtension();

        $allowed_ext = ['xls', 'csv', 'xlsx'];

        if (in_array($file_extension, $allowed_ext)) {
            $inputFileNamePath = $request->file('excel')->getPathname();
            $spreadshet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);

            // ISI DATA
            $data = $spreadshet->getActiveSheet()->removeRow(1, 2)->toArray();
            foreach ($data as $row) {
                $isi_data = [
                    'tahun_masuk' => $row[0],
                    'nomor_induk' => $row[1],
                    'password' => bcrypt($row[1]),
                    'nama' => $row[2],
                    'alamat' => $row[3],
                    'jenis_kelamin' => $row[4],
                    'nama_wali' => $row[5],
                    'hp_siswa' => $row[6],
                    'hp_wali' => $row[7],
                    'tes_diagnostik' => $row[8]
                ];

                Siswa::create($isi_data);
            }
            return back()->with('success', 'Data berhasil diimport');
        } else {
            return back()->with('error', 'Jenis file tidak didukung');
        }
    }
}
