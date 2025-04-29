<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Olahraga extends Model
{
    use HasFactory;
    protected $table = 'olahragas';
    protected $fillable = ['id_siswa','image','waktu'];

    public function siswa():BelongsTo{
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
}
