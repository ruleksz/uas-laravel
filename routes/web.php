<?php

namespace App\Http\Controllers;

use \App\Http\Controllers\DosenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin']);
    Route::get('/admin/dosen', [AdminController::class, 'dosen']);
    Route::get('/admin/mahasiswa', [AdminController::class, 'mahasiswa']);
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('dosen/data_mahasiswa', [DosenMahasiswaController::class, 'index'])->name('dosen.mahasiswa.index');
Route::get('mahasiswa/data_mahasiswa', [MahasiswaDataController::class, 'index'])->name('mahasiswa.mahasiswa.index');
Route::get('mahasiswa/{mahasiswa}/view_matkul', [MahasiswaDataController::class, 'show'])->name('mahasiswa.mahasiswa.show');

// routes/web.php
Route::resource('dosen', DosenController::class);
Route::resource('mahasiswa', \App\Http\Controllers\MahasiswaController::class);

Route::resource('matakuliah', MatakuliahController::class);

Route::get('/relasi', [MahasiswaMatakuliahController::class, 'index'])->name('relasi.index');
Route::get('/relasi/create', [MahasiswaMatakuliahController::class, 'create'])->name('relasi.create');
Route::post('/relasi/store', [MahasiswaMatakuliahController::class, 'store'])->name('relasi.store');
Route::get('/relasi/{mahasiswa}/edit', [MahasiswaMatakuliahController::class, 'edit'])->name('relasi.edit');
Route::put('/relasi/{mahasiswa}', [MahasiswaMatakuliahController::class, 'update'])->name('relasi.update');
Route::delete('/relasi/{mahasiswa}/{matakuliah}', [MahasiswaMatakuliahController::class, 'destroy'])->name('relasi.destroy');
