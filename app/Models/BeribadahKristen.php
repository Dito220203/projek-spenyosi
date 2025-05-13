<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class BeribadahKristen extends Model
{
    use HasFactory;
    protected $table = 'beribadah_kristens';
    protected $fillable = ['id_siswa','doa_pagi', 'alkitab', 'doa_malam'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
