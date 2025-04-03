<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\MovimientoController;

//escribe las Rutas de tu aplicacion aqui


Route::get('/', [CuentasController::class, 'index'])->name("cuentas.index");
Route::get('/create', [CuentasController::class, 'create'])->name("cuentas.create");
Route::post('/store', [CuentasController::class, 'store'])->name("cuentas.store");


Route::get('/ingreso/{id}', [MovimientoController::class, 'create_ingreso'])->name("movimiento.ingreso");
Route::get('/retirada/{id}', [MovimientoController::class, 'create_retirada'])->name("movimiento.retiro");
Route::post('/retirada/{id}', [MovimientoController::class, 'store_retirada'])->name("movimiento.retirar");

Route::get('/index/{id}', [MovimientoController::class, 'index'])->name("movimientos.index");
Route::post('/ingreso/{id}', [MovimientoController::class, 'store_ingreso'])->name("movimiento.ingresar");







// CREA LAS RUTAS
