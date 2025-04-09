<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;

// Ruta principal muestra login siempre
Route::get('/', function () {
    auth()->logout(); // Forzar cierre de sesión
    return view('auth.login');
});

// Rutas accesibles sin autenticación
Route::group([], function () {
    // Página de bienvenida pública
    Route::get('/welcome', function () {
        return view('welcome');
    });
    
    // Rutas de autenticación
Auth::routes([
    'register' => true,
    'verify' => true
]);
});

// Solo para usuarios autenticados
Route::middleware(['auth', 'verified'])->group(function () {
    // Página principal después de login
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home')
        ->middleware('auth'); // Solo verifica autenticación básica
    
    // Rutas de productos
    Route::prefix('productos')->middleware(['auth'])->group(function () {
        Route::get('/', [ProductoController::class, 'index'])->name('producto.index');
        Route::get('/nuevo', [ProductoController::class, 'create'])->name('producto.create');
        Route::post('/store', [ProductoController::class, 'store'])->name('producto.store');
        Route::get('/{producto}', [ProductoController::class, 'show'])->name('producto.show');
        Route::get('/edit/{producto}', [ProductoController::class, 'edit'])->name('producto.edit');
        Route::patch('/{producto}', [ProductoController::class, 'update'])->name('producto.update');
        Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('producto.delete');
    });

    // Rutas de categorías
    Route::prefix('categorias')->group(function () {
        Route::get('/', [CategoriaController::class, 'index'])->name('categoria.index');
        Route::post('/store', [CategoriaController::class, 'store'])->name('categoria.store');
        Route::get('/edit/{categoria}', [CategoriaController::class, 'edit'])->name('categoria.edit');
        Route::patch('/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
        Route::delete('/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.delete');
    });

    // Rutas de carrito
    Route::prefix('carrito')->group(function () {
        Route::get('/', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
        Route::post('/agregar/{productoId}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
        Route::delete('/eliminar/{productoId}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    });
});
