<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class BeribadahKristen extends Model
{
    use HasFactory;
    protected $table = 'beribadahs';
    protected $fillable = ['subuh', 'asar', 'isyak'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
