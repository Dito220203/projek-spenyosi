<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table =  'siswas';
    protected $fillable = ['nis', 'nama', 'kelas', 'agama', 'password'];

    public function rekapabsensi(): HasMany
    {
        return $this->hasMany(RekapAbsensi::class, 'id_siswa');
    }
}
