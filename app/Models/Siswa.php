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
    protected $fillable = ['nis','nama','kelas','agama','password'];
    protected $with=["bangunpagi","belajar","beribadah","istirahat","makan","masyarakat","olahraga"];

    public function bangunpagi():HasMany{
        return $this->hasMany(BangunPagi::class,"id_siswa");
    }
    public function belajar():HasMany{
        return $this->hasMany(Belajar::class,"id_siswa");
    }
    public function beribadah():HasMany{
        return $this->hasMany(Beribadah::class,"id_siswa");
    }
    public function beribadahkristen():HasMany{
        return $this->hasMany(BeribadahKristen::class,"id_siswa");
    }
    public function istirahat():HasMany{
        return $this->hasMany(Istirahat::class,"id_siswa");
    }
    public function makan():HasMany{
        return $this->hasMany(Makan::class,"id_siswa");
    }
    public function masyarakat():HasMany{
        return $this->hasMany(Masyarakat::class,"id_siswa");
    }
    public function olahraga():HasMany{
        return $this->hasMany(Olahraga::class,"id_siswa");
    }
}
