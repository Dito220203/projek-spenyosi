<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Olahraga extends Model
{
    use HasFactory;
    protected $table = 'olahragas';
    protected $fillable = ['image','waktu','ket_olahraga'];

    public function rekapabsensi():HasOne{
        return $this->hasOne(Siswa::class,'id_siswa');
    }
}
