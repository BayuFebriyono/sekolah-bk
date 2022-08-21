<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataTertib extends Model
{
    use HasFactory;
    protected $table = 'tata_tertib';
    protected $guarded = ['id'];

    public function rekamanTataTertib()
    {
        $this->hasMany(RekamanTataTertib::class);
    }
}
