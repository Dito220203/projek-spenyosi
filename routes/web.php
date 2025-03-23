<?php

use App\Http\Controllers\KebiasaananakController;
use App\Http\Controllers\walikelasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
use Illuminate\Support\Facades\Auth;


Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/VIIA', function () {
    return view('admin.VIIA');
});

//loginSiswa
Route::get('/', function () {
    return view('siswa.login');
});

//siswa
Route::post('/siswa',[KebiasaananakController::class,'index'])->name('siswa');
Route::post('/siswa/store', [KebiasaananakController::class, 'store'])->middleware('auth')->name('siswa.store');
Route::post('/siswa/update', [KebiasaananakController::class, 'update'])->name('siswa.update');

//walikelas

Route::get('/walikelas',[walikelasController::class,'index'])->name('walikelas');
