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
        Schema::create('rekap_absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->references('id')->on('siswas');
            $table->foreignId('id_bangun_pagi')->nullable()->references('id')->on('bangun_pagis');
            $table->foreignId('id_belajar')->nullable()->references('id')->on('bangun_pagis');
            $table->foreignId('id_beribadah')->nullable()->references('id')->on('beribadahs');
            $table->foreignId('id_istirahat')->nullable()->references('id')->on('istirahats');
            $table->foreignId('id_makan')->nullable()->references('id')->on('makans');
            $table->foreignId('id_masyarakat')->nullable()->references('id')->on('masyarakats');
            $table->foreignId('id_olahraga')->nullable()->references('id')->on('olahragas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_absensis');
    }
};
