<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index']);

// untuk menampilkan data
Route::get('/makanan', [MakananController::class,'index']);
// untuk menampilkan data yang dipilih
Route::get('/makanan/{id}', [MakananController::class,'show']);
// mengarahkan untuk menampilkan tampilan create
Route::get('/makanan/data/create', [MakananController::class,'create']);
// untuk menyimpan data ke db
Route::post('/makanan', [MakananController::class,'store']);
// untuk menampilkan view form data edit
Route::get('/makanan/{id}/edit', [MakananController::class,'edit'])->name('edit');
// mengupdate data ke db
Route::put('/makanan/{id}', [MakananController::class,'update'])->name('update');
// mendelete data
Route::delete('/makanan/{id}', [MakananController::class,'destroy']);







