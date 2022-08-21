<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guru extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $guarded = ['id'];

    public function waliKelas()
    {
        return $this->hasOne(WaliKelas::class);
    }

    public function guruBk()
    {
        return $this->hasOne(GuruBk::class);
    }

    public function kesiswaan()
    {
        return $this->hasOne(Kesiswaan::class);
    }

    public function rekamanTataTertib()
    {
        $this->hasMany(RekamanTataTertib::class);
    }
}
