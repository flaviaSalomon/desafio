<?php

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


Route::view('/', 'mantenedor')->name('mantenedor');


Route::get('/transacciones', [\App\Http\Controllers\TransaccionesController::class, 'index'])->name('transacciones.index');
Route::get('/create', [\App\Http\Controllers\TransaccionesController::class, 'create'])->name('transacciones.create');
Route::post('/store', [\App\Http\Controllers\TransaccionesController::class, 'store'])->name('transacciones.store');
Route::get('/edit/{id}', [\App\Http\Controllers\TransaccionesController::class, 'edit'])->name('transacciones.edit');
Route::put('/update/{id}', [\App\Http\Controllers\TransaccionesController::class, 'update'])->name('transacciones.update');

Route::get('/show/{id}', [\App\Http\Controllers\TransaccionesController::class, 'show'])->name('transacciones.show');
Route::delete('/destroy/{id}', [\App\Http\Controllers\TransaccionesController::class, 'destroy'])->name('transacciones.destroy');

