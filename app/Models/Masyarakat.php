<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table = 'masyarakats';
    protected $fillable = ['id_siswa','keterangan','image'];

    public function siswa():BelongsTo{
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
}
