<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function wargaKelas()
    {
        return $this->hasOne(WargaKelas::class);
    }

    public function rekamanTataTertib()
    {
        return $this->hasMany(RekamanTataTertib::class);
    }
}
