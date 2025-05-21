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
        Schema::create('beribadahs', function (Blueprint $table) {
            $table->id();
            $table->time("subuh")->nullable();
            $table->time("duhur")->nullable();
            $table->time("asar")->nullable();
            $table->time("magrib")->nullable();
            $table->time("isyak")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beribadahs');
    }
};
