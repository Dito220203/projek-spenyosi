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


Route::get('/loginadmin', [LoginAdminController::class, 'index'])->name('loginadmin');
Route::post('/loginadmin', [LoginAdminController::class, 'authenticate'])->name('loginadmin.authenticate');

Route::get('/admin', [adminController::class, 'index'])->name('admin.index');
Route::get('/admin/rekap-absensi/{kelas}', [AdminController::class, 'getAbsensi'])->name('getAbsensi');

Route::get('/admin/export/{kelas}', [adminController::class, 'export'])->name('admin.export');



// KELAS VIII


Route::get('/Datasiswa', [DataSiswaController::class, 'index']);
Route::post('/Datasiswa', [DataSiswaController::class, 'store'])->name('siswa.store');
Route::put('/Datasiswa/{id}', [DataSiswaController::class, 'update'])->name('siswa.update');


Route::post('/import-siswa', [DataSiswaController::class, 'import'])->name('siswa.import');



// Route::get('/export-excel', [adminController::class, 'exportExcel'])->name('export.excel');

Route::get('/search-siswa', [adminController::class, 'search'])->name('siswa.search');






// Route::get('/rekap/hari-ini', [AdminController::class, 'rekapHariIni'])->name('recap.today');
// Route::get('/rekap/bulan', [SiswaController::class, 'rekapBulan'])->name('recap.month');
// Route::get('/rekap/export-pdf', [AdminController::class, 'exportPdf'])->name('export.pdf');



//loginSiswa
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-siswa', [LoginController::class, 'login'])->name('login.post');

//siswa
Route::middleware(['auth:siswa'])->group(function () {
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
});
