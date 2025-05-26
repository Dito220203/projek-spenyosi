<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RekapAbsensi extends Model
{
    use HasFactory;

    protected $table = 'rekap_absensis';
    protected $fillable = ['id_siswa', 'id_bangun_pagi', 'id_belajar', 'id_beribadah', 'id_istirahat', 'id_makan', 'id_masyarakat', 'id_olahraga'];
    protected $with = ['siswa', 'bangunpagi', 'belajar', 'beribadah', 'istirahat', 'makan', 'masyarakat', 'olahraga'];
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function bangunpagi(): belongsTo
    {
        return $this->belongsTo(BangunPagi::class, "id_bangun_pagi");
    }
    public function belajar(): belongsTo
    {
        return $this->belongsTo(Belajar::class, "id_belajar");
    }
    public function beribadah(): belongsTo
    {
        return $this->belongsTo(Beribadah::class, "id_beribadah");
    }
    public function beribadahkristen(): belongsTo
    {
        return $this->belongsTo(Beribadah::class, "id_beribadahkristen");
    }
    public function istirahat(): belongsTo
    {
        return $this->belongsTo(Istirahat::class, "id_istirahat");
    }
    public function makan(): belongsTo
    {
        return $this->belongsTo(Makan::class, "id_makan");
    }
    public function masyarakat(): belongsTo
    {
        return $this->belongsTo(Masyarakat::class, "id_masyarakat");
    }
    public function olahraga(): belongsTo
    {
        return $this->belongsTo(Olahraga::class, "id_olahraga");
    }

    public function scopeByKelas($query, $kelas)
    {
        return $query->whereHas('siswa', function ($q) use ($kelas) {
            $q->where('kelas', $kelas);
        });
    }

    public function isFilled()
    {
        return $this->id_bangun_pagi || $this->id_belajar || $this->id_beribadah ||
            $this->id_istirahat || $this->id_makan || $this->id_masyarakat ||
            $this->id_olahraga;
    }
}
