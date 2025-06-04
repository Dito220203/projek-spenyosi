<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\DataSiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\RekapController;
use Illuminate\Support\Facades\Auth;


Route::get('/login', [LoginAdminController::class, 'index'])->name('loginadmin');
Route::post('/loginadmin', [LoginAdminController::class, 'authenticate'])->name('login.admin');
Route::middleware(['authadmin'])->group(function () {
Route::get('/admin', [adminController::class, 'index'])->name('admin.index');
Route::get('/admin/rekap-absensi/{kelas}', [AdminController::class, 'getAbsensi'])->name('getAbsensi');
Route::get('/admin/export/{kelas}', [adminController::class, 'export'])->name('admin.export');

Route::get('/Datasiswa', [DataSiswaController::class, 'index']);
Route::post('/Datasiswa', [DataSiswaController::class, 'store'])->name('siswa.store');
Route::put('/Datasiswa/{id}', [DataSiswaController::class, 'update'])->name('siswa.update');
Route::delete('/Datasiswa/{id}', [DatasiswaController::class, 'destroy'])->name('siswa.destroy');

Route::post('/Datasiswa/promote', [DataSiswaController::class, 'promote'])->name('Datasiswa.promote');
Route::post('/import-siswa', [DataSiswaController::class, 'import'])->name('siswa.import');
Route::get('/siswa/search', [DataSiswaController::class, 'search'])->name('siswa.search');
Route::post('/logoutadmin', [LoginAdminController::class, 'logout'])->name('logout.admin');
});

//loginSiswa
Route::get('/', [LoginController::class, 'index'])->name('loginsiswa');
Route::post('/login-siswa', [LoginController::class, 'login'])->name('login.post');

//siswa
Route::middleware(['authsiswa'])->group(function () {
    Route::get('/siswa', [siswaController::class, 'index'])->name('siswa.index');
    Route::post('/bangun-pagi', [siswaController::class, 'bgnPagi'])->name('bangunpagi');
    Route::post('/masyarakat', [siswaController::class, 'Masyarakat'])->name('masyarakat');
    Route::post('/beribadah', [siswaController::class, 'Beribadah'])->name('beribadah');
    Route::post('/beribadah-kristen', [siswaController::class, 'Beribadah'])->name('beribadahkristen');

    Route::post('/olahraga', [siswaController::class, 'Olahraga'])->name('olahraga');
    Route::post('/belajar', [siswaController::class, 'Belajar'])->name('belajar');
    Route::post('/makan', [siswaController::class, 'Makan'])->name('makan');
    Route::post('/istirahat', [siswaController::class, 'Istirahat'])->name('istirahat');
    Route::get('/siswa/status-kebiasaan', [siswaController::class, 'cekStatusKebiasaan']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout.siswa');
});
