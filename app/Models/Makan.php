<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Makan extends Model
{
    use HasFactory;
    protected $table = 'makans';
    protected $fillable = ['id_siswa','image','karbohidrat','serat','protein'];

    public function siswa():BelongsTo{
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
}
