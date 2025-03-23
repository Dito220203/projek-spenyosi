<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('7kebiasaan_siswa', function (Blueprint $table) {

            $table->id();
            $table->string('waktu_bangun'); // Field untuk waktu bangun pagi

            $table->string('beribadah');
            $table->string('subuh');
            $table->string('subuh_image');
            $table->string('subuh_time');
            $table->string('dzuhur');
            $table->string('dzuhur_image');
            $table->string('dzuhur_time');
            $table->string('ashar');
            $table->string('ashar_image');
            $table->string('ashar_time');
            $table->string('maghrib');
            $table->string('maghrib_image');
            $table->string('maghrib_time');
            $table->string('isya');
            $table->string('isya_image');
            $table->string('isya_time');

            $table->string('waktu_olahraga');
            $table->string('jenis_olahraga');

            $table->string('makan');
            $table->string('keterangan_makan_sehat');

            $table->string('bermasyarakat'); // Field untuk waktu bermasyarakat (isya)
            $table->string('keterangan_bermasyarakat');
            $table->string('bermasyarakat_image');

            $table->string('waktu_istirahat');
            $table->string('keterangan_istirahat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('7kebiasaan_siswa');
    }
};
