<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Makan extends Model
{
    use HasFactory;
    protected $table = 'makans';
    protected $fillable = ['image','karbohidrat','serat','protein'];



    public function rekapabsensi():HasOne{
        return $this->hasOne(Siswa::class,'id_siswa');
    }
}
