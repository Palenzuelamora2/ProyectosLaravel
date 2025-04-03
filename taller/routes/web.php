<?php

use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\VehiculosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VehiculosController::class, 'index'])->name("vehiculos.index");
Route::get('/create', [VehiculosController::class, 'create'])->name("vehiculos.create");
Route::post('/store', [VehiculosController::class, 'store'])->name("vehiculos.store");
Route::get('/show', [VehiculosController::class, 'show'])->name("vehiculos.show");
Route::get('/historialrevisiones/{id}', [VehiculosController::class, 'historial'])->name("revisiones.historial");



Route::get('/createrevisiones/{id}', [RevisionesController::class, 'create'])->name("vehiculos.show");
Route::post('/storerevisiones/{id}', [RevisionesController::class, 'store'])->name("revisiones.store");
// CREA LAS RUTAS