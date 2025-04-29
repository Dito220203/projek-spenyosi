<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Testing\Fluent\Concerns\Has;

class BangunPagi extends Model
{
    use HasFactory;
    protected $table = 'bangun_pagis';
    protected $fillable = ['id_siswa', 'waktu'];


    public function siswa():BelongsTo{
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
}
