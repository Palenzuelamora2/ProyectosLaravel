<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;

use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'index'])->name("producto.index");

Route::prefix('categorias')->group(function () {
    Route::get("/categorias", [CategoriaController::class, 'index'])->name("categoria.index");
    Route::get("/create", [CategoriaController::class, 'create'])->name("categoria.create");
    Route::post("/store", [CategoriaController::class, 'store'])->name("categoria.store");
    Route::get("/edit/{id}", [CategoriaController::class, 'edit'])->name("categoria.edit");
    Route::put("/edit/{id}", [CategoriaController::class, 'update'])->name("categoria.update");
    Route::get("/destroy/{id}", [CategoriaController::class, 'destroy'])->name("categoria.destroy");
});


Route::prefix('proveedores')->group(function () {
    Route::get("/proveedores", [ProveedorController::class, 'index'])->name("proveedores.index");
    Route::get("/create", [ProveedorController::class, 'create'])->name("proveedores.create");
    Route::post("/store", [ProveedorController::class, 'store'])->name("proveedores.store");
    Route::get("/edit/{id}", [ProveedorController::class, 'edit'])->name("proveedores.edit");
    Route::put("/edit/{id}", [ProveedorController::class, 'update'])->name("proveedores.update");
    Route::get("/destroy/{id}", [ProveedorController::class, 'destroy'])->name("proveedores.destroy");
});
Route::prefix('productos')->group(function () {
    Route::get("/index", [ProductoController::class, 'index'])->name("producto.index");
    Route::get("/mostrarProducto/{id}", [ProductoController::class, 'show'])->name("producto.show");
    Route::get("/create", [ProductoController::class, 'create'])->name("producto.create");
    Route::post("/store", [ProductoController::class, 'store'])->name("producto.store");
    Route::get("/edit/{id}", [ProductoController::class, 'edit'])->name("producto.edit");
    Route::put("/edit/{id}", [ProductoController::class, 'update'])->name("producto.update");
    Route::get("/destroy/{id}", [ProductoController::class, 'destroy'])->name("producto.destroy");
});
