<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Testing\Fluent\Concerns\Has;

class BangunPagi extends Model
{
    use HasFactory;
    protected $table = 'bangun_pagis';
    protected $fillable = ['waktu'];

    public function rekapabsensi():HasOne{
        return $this->hasOne(Siswa::class,'id_siswa');
    }
}
