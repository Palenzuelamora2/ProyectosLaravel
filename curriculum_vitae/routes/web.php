<?php

use App\Http\Controllers\Auth\ComunidadController;
use App\Http\Controllers\Auth\HabilidadesController;
use App\Http\Controllers\Auth\ProyectosController;
use App\Http\Controllers\Auth\ExperienciaController;
use App\Http\Controllers\Auth\FormacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
//LA PAGINA DE INICIO DE LA APLICACION
Route::get('/', function () {
    return view('welcome');
});


//ESTAN TODAS LAS RUTAS DEFINIDAS POR SU PREFIJO DENTRO DEL MIDDLEWARE





Route::middleware('auth')->group(function () {
    Route::get("dashboard", [DashboardController::class, 'index'])->name("dashboard");
    Route::prefix('experiencia')->group(function () {
        Route::get("/create", [ExperienciaController::class, 'create'])->name("experiencia.create");
        Route::post("/store", [ExperienciaController::class, 'store'])->name("experiencia.store");
        Route::get('/edit{id}', [ExperienciaController::class, 'edit'])->name('experiencia.edit');
        Route::patch('/edit{id}', [ExperienciaController::class, 'update'])->name('experiencia.update');
    });
    Route::prefix('habilidades')->group(function () {
        Route::get("/create", [HabilidadesController::class, 'create'])->name("habilidad.create");
        Route::post("/store", [HabilidadesController::class, 'store'])->name("habilidad.store");
        Route::get('/edit{id}', [HabilidadesController::class, 'edit'])->name('habilidad.edit');
        Route::patch('/edit{id}', [HabilidadesController::class, 'update'])->name('habilidad.update');
    });

    Route::prefix('formacion')->group(function () {
        Route::get("/create", [FormacionController::class, 'create'])->name("formacion.create");
        Route::post("/store", [FormacionController::class, 'store'])->name("formacion.store");
        Route::get('/edit{id}', [FormacionController::class, 'edit'])->name('formacion.edit');
        Route::patch('/edit{id}', [FormacionController::class, 'update'])->name('formacion.update');
    });

    Route::prefix('proyecto')->group(function () {
        Route::get("/create", [ProyectosController::class, 'create'])->name("proyecto.create");
        Route::post("/store", [ProyectosController::class, 'store'])->name("proyecto.store");
        Route::get('/edit{id}', [ProyectosController::class, 'edit'])->name('proyecto.edit');
        Route::patch('/edit{id}', [ProyectosController::class, 'update'])->name('proyecto.update');
    });
    Route::get('/profile/curriculum/{id}', [ProfileController::class, 'curriculum'])->name('perfil.curriculum');
    Route::get('/profile/buscar', [ProfileController::class, 'buscar'])->name('perfil.buscar');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
