<?php

use App\Http\Controllers\KebiasaananakController;
use App\Http\Controllers\LoginController;
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
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-siswa', [LoginController::class, 'login'])->name('login.post');

//siswa
Route::middleware(['auth:siswa'])->group(function (){
    Route::get('/siswa', [siswaController::class, 'index'])->name('siswa.index');
    Route::post('/bangun-pagi', [siswaController::class, 'bgnPagi'])->name('bangunpagi');
    Route::post('/masyarakat', [siswaController::class, 'Masyarakat'])->name('masyarakat');
    Route::post('/beribadah', [siswaController::class, 'Beribadah'])->name('beribadah');
    Route::post('/olahraga', [siswaController::class, 'Olahraga'])->name('olahraga');
    Route::post('/belajar', [siswaController::class, 'Belajar'])->name('belajar');
    Route::post('/makan', [siswaController::class, 'Makan'])->name('makan');
    Route::post('/istirahat', [siswaController::class, 'Istirahat'])->name('istirahat');
    Route::get('/siswa/status-kebiasaan', [siswaController::class, 'cekStatusKebiasaan']);



});




//walikelas

Route::get('/walikelas',[walikelasController::class,'index'])->name('walikelas');
