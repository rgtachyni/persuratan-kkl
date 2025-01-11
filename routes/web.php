<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersuratanController;

// Route::get('/index', function () {
//     return view('index');
// })->name('dashboard');

Route::get('/index',[PersuratanController::class,'dashboard'])->name('dashboard');

Route::get('/surat-masuk', [PersuratanController::class, 'index'])->name('indexSuratMasuk');
Route::post('/surat-form', action: [PersuratanController::class, 'store'])->name('surat.store');
Route::get('/form', [PersuratanController::class, 'form'])->name('form');


//menghapus data
Route::delete('/persuratan/delete/{id}', [PersuratanController::class, 'delete'])->name('persuratan.delete');
Route::get('/surat-masuk/edit/{id}', [PersuratanController::class, 'edit'])->name('persuratan.edit');

//login
Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login');

Route::get('/edit', function () {
    return view('persuratan.edit');
});
