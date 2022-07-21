<?php

use App\Http\Controllers\LicenciaController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/* Route welcome, this is the first view of the app */
Route::get('/', function () {
        return view('principal');
})->name('welcome');

/* Route view Policy */
Route::get('/welcome-policy', function () {
    return view('welcome-policy');
})->name('welcome-policy');

/* Route blog index*/
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');

/* Route for the dashboard */
Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth','admin');

/* Route for the categories */
Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class)->names('categories')->middleware('auth','admin');

/* Route for the post */
Route::resource('posts', App\Http\Controllers\Admin\PostController::class)->names('posts');

/* Search posts by category */
Route::get('category/{category}', [App\Http\Controllers\Admin\PostController::class, 'category'])->name('posts.category');

Route::get('posts/{post}', [App\Http\Controllers\BlogController::class, 'show'])->name('posts.show');


/* Download the trial program */
Route::get('/download-trial', function() {
    $file="./programa/MASIVOXML.msi";
    return Response::download($file);
})->name('download-trial');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('licencias', App\Http\Controllers\LicenciaController::class)->names('licencias');
Route::resource('users', App\Http\Controllers\UsuarioController::class)->names('users');

/* Rutas para iniciar sesión y cerrar sesión */
Route::get('iniciar-sesion', [App\Http\Controllers\AutenticarController::class, 'credenciales'])->name('login');
Route::post('validar', [App\Http\Controllers\AutenticarController::class, 'autenticar'])->name('validar');
Route::get('salir', [App\Http\Controllers\AutenticarController::class, 'salida'])->name('salir');

// Ruta para la interfaz de comprar
Route::get('comprar-licencia', [App\Http\Controllers\LicenciaController::class, 'comprar'])->name('licencias.comprar');
Route::post('comprar-licencia-store', [App\Http\Controllers\LicenciaController::class, 'storePublic'])->name('licencias.storePublic');
Route::get('comprar-licencia-datos/{datosLicencia}', [App\Http\Controllers\LicenciaController::class, 'vistaComprarDescargarPdf'])->name('licencias.vistaComprarDescargarPdf');

/* Ruta para descargar una cita en pdf respecto al id que se seleccione en el index */
Route::get('exportarCitapdf/{id}',[App\Http\Controllers\LicenciaController::class, 'exportarverCitaPdfPdf'])->name('licencias.cita.pdf-download');