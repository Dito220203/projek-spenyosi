<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\walikelasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\RekapController;
use Illuminate\Support\Facades\Auth;


Route::get('/loginadmin', [LoginAdminController::class, 'index'])->name('loginadmin');
Route::post('/loginadmin', [LoginAdminController::class, 'authenticate'])->name('loginadmin.authenticate');

Route::get('/admin', [adminController::class, 'index'])->name('admin.index');
Route::get('/VIIA', [AdminController::class, 'VIIA']);
Route::get('/VIIB', [AdminController::class, 'VIIB']);
Route::get('/VIIC', [AdminController::class, 'VIIC']);
Route::get('/VIID', [AdminController::class, 'VIID']);
Route::get('/VIIE', [AdminController::class, 'VIIE']);
Route::get('/VIIF', [AdminController::class, 'VIIF']);
Route::get('/VIIG', [AdminController::class, 'VIIG']);
Route::get('/VIIH', [AdminController::class, 'VIIH']);
Route::get('/VIII', [AdminController::class, 'VIII']);
// KELAS VIII
Route::get('/VIIIA', [AdminController::class, 'VIIIA']);
Route::get('/VIIIB', [AdminController::class, 'VIIIB']);
Route::get('/VIIIC', [AdminController::class, 'VIIIC']);
Route::get('/VIIID', [AdminController::class, 'VIIID']);
Route::get('/VIIIE', [AdminController::class, 'VIIIE']);
Route::get('/VIIIF', [AdminController::class, 'VIIIF']);
Route::get('/VIIIG', [AdminController::class, 'VIIIG']);
Route::get('/VIIIH', [AdminController::class, 'VIIIH']);
Route::get('/VIIII', [AdminController::class, 'VIIII']);


Route::get('/export-excel', [adminController::class, 'exportExcel'])->name('export.excel');







Route::get('/rekap/hari-ini', [AdminController::class, 'rekapHariIni'])->name('recap.today');
Route::get('/rekap/bulan', [SiswaController::class, 'rekapBulan'])->name('recap.month');
Route::get('/rekap/export-pdf', [AdminController::class, 'exportPdf'])->name('export.pdf');



//loginSiswa
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-siswa', [LoginController::class, 'login'])->name('login.post');

//siswa
Route::middleware(['auth:siswa'])->group(function (){
    Route::get('/siswa', [siswaController::class, 'index'])->name('siswa.index');
    Route::post('/bangun-pagi', [siswaController::class, 'bgnPagi'])->name('bangunpagi');
    Route::post('/masyarakat', [siswaController::class, 'Masyarakat'])->name('masyarakat');
    Route::post('/beribadah', [siswaController::class, 'Beribadah'])->name('beribadah');
    Route::post('/beribadah-kristen', [siswaController::class, 'BeribadahKristen'])->name('beribadahkristen');

    Route::post('/olahraga', [siswaController::class, 'Olahraga'])->name('olahraga');
    Route::post('/belajar', [siswaController::class, 'Belajar'])->name('belajar');
    Route::post('/makan', [siswaController::class, 'Makan'])->name('makan');
    Route::post('/istirahat', [siswaController::class, 'Istirahat'])->name('istirahat');
    Route::get('/siswa/status-kebiasaan', [siswaController::class, 'cekStatusKebiasaan']);



});




//walikelas

Route::get('/walikelas',[walikelasController::class,'index'])->name('walikelas');
