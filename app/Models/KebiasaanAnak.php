<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebiasaanAnak extends Model
{
    use HasFactory;

    protected $table = '7kebiasaan_siswa';
    protected $fillable = [
        'waktu_bangun', 'beribadah', 'subuh', 'subuh_image', 'subuh_time',
        'dzuhur', 'dzuhur_image', 'dzuhur_time', 'ashar', 'ashar_image', 'ashar_time',
        'maghrib', 'maghrib_image', 'maghrib_time', 'isya', 'isya_image', 'isya_time',
        'waktu_olahraga', 'jenis_olahraga', 'makan', 'keterangan_makan_sehat',
        'bermasyarakat', 'keterangan_bermasyarakat', 'bermasyarakat_image',
        'waktu_istirahat', 'keterangan_istirahat'
    ];
}
