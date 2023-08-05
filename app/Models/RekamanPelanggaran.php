<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamanPelanggaran extends Model
{
    use HasFactory;
    protected $table = 'rekaman_pelanggaran';
    protected $guarded = ['id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function tataTertib()
    {
        return $this->belongsTo(TataTertib::class);
    }
}
