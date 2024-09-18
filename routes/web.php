<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Rutas de postulados
use App\Http\Controllers\postulados\busqueda;
use App\Http\Controllers\postulados\registro;
use App\Http\Controllers\postulados\perfil;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/dashboard', function () {
    return view('Postulados.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/buscador', [busqueda::class, 'search'])->name('estudiantes.search');
Route::get('/buscar', [busqueda::class, 'buscar'])->name('buscar');

Route::get('/registro_postulado', [registro::class, 'create'])->name('registro_postulado');
Route::post('/registro_postulado', [registro::class, 'store'])->name('registro_postulado');

Route::get('/postulado/perfil/{id}', [perfil::class, 'mostrarPerfil'])->name('perfil.aspirante');
Route::get('/archivos/{nombreArchivo}', [perfil::class, 'descargarArchivo'])->name('descargar.archivo');



Route::middleware(['role:Ingresos'])->group(function () {

});
// Rutas para usuarios de ingreso
Route::middleware(['role:ingreso'])->group(function () {
    //rutas de la busqueda de postulados.

});

// Rutas para usuarios de sistemas
Route::middleware(['role:sistemas'])->group(function () {

    // Otras rutas para usuarios de sistemas

});



// Ruta para la busqueda sin ingresar 
Route::get('/buscar', [busqueda::class, 'buscar'])->name('buscar');

require __DIR__.'/auth.php';
