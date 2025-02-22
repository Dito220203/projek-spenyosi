<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});



//siswa
Route::get('/siswa', function () {
    return view('siswa.index');
});
