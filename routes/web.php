<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/productos', [ProductoController::class , 'index'])->name('producto.index');

Route::get('/producto/nuevo', [ProductoController::class, 'create'])->name('producto.create');

Route::get('/producto/{producto}', [ProductoController::class, 'show'])->name('producto.show');

Route::post('/producto/store', [ProductoController::class, 'store'])->name('producto.store');

Route::delete('/producto/{producto}', [ProductoController::class, 'destroy'])->name('producto.delete');

Route::get('/producto/edit/{producto}', [ProductoController::class, 'edit'])->name('producto.edit');

Route::patch('/producto/{producto}', [ProductoController::class, 'update'])->name('producto.update');

Route::get('/categorias', [CategoriaController::class , 'index'])->name('categoria.index');
Route::post('/carrito/agregar/{productoId}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{productoId}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');

Route::post('/categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');

Route::get('/categoria/edit/{categoria}', [CategoriaController::class, 'edit'])->name('categoria.edit');

Route::delete('/categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.delete');

Route::patch('/categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
