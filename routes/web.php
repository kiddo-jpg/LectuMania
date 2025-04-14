<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas públicas
Route::get('/ingresar', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::post('/ingresar', [UsuariosController::class, 'store'])->name('usuarios.store');



Route::get('/libros', [LibrosController::class, 'index'])->name('libros.index')->middleware('auth');
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/libros/create', [LibrosController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibrosController::class, 'store'])->name('libros.store');
Route::get('/libros/{id}/edit', [LibrosController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{id}', [LibrosController::class, 'update'])->name('libros.update');
Route::delete('/libros/{id}', [LibrosController::class, 'destroy'])->name('libros.destroy');

Route::get('/perfil', [AuthController::class, 'perfil'])->name('perfil')->middleware('auth');
Route::post('/perfil', [AuthController::class, 'updatePerfil'])->name('perfil.update')->middleware('auth');
Route::delete('/perfil', [AuthController::class, 'eliminarCuenta'])->name('perfil.eliminar')->middleware('auth');

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el inicio de sesión
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');