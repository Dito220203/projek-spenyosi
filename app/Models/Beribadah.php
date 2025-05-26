<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Beribadah extends Model
{
    use HasFactory;
    protected $table = 'beribadahs';
    protected $fillable = ['subuh','duhur','asar','magrib','isyak'];



    public function rekapabsensi():HasOne{
        return $this->hasOne(Siswa::class,'id_siswa');
    }
}
