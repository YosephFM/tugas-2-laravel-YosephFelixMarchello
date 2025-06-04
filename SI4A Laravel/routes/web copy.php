<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\jadwalController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil',function(){
    return view('profil');
});

Route::resource('/fakultas',FakultasController::class);
Route::resource('/prodi',ProdiController::class);
Route::resource('/mahasiswa',MahasiswaController::class);
route::resource('/sesi',SesiController::class);
Route::resource('/mata_kuliah',MataKuliahController::class);
route::resource('/jadwal',jadwalController::class);
Route::get('/Dashboard', [DashboardController::class, 'index']);


