<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('carritos', CarritoController::class);



    Route::get('/productos', [ProductoController::class, 'index'])->name('productos');

    Route::resource('facturas', FacturaController::class);

    Route::post('/facturas/cambiar_estado', [FacturaController::class, 'cambiar_estado'])
        ->name('cambiar_estado');

    Route::post('/carritos/meter/{producto}', [CarritoController::class, 'anadiralcarrito'])
        ->name('anadiralcarrito');

    Route::post('/carritos/restar/{carrito}', [CarritoController::class, 'restar'])
        ->name('restar');

    Route::post('/carritos/sumar/{carrito}', [CarritoController::class, 'sumar'])
        ->name('sumar');

    Route::post('/carritos/vaciar', [CarritoController::class, 'vaciar'])
        ->name('vaciar');

    Route::post('/pedidoEstado/{linea}', [LineaController::class, 'edit'])
        ->name('edit');

        Route::post('/carritos/factura', [CarritoController::class, 'pedido'])
        ->name('pedido');

    /* Route::resource('todosLosPedidos', PedidoAdminController::class)
        ->middleware(['auth', 'can:solo-admin']); */
});

Route::middleware(['auth', 'can:solo-admin'])->group(function () {

    Route::resource('todosLosPedidos', PedidoAdminController::class);

    Route::get('/productos/index', [ProductoController::class, 'edit']);
    Route::get('/productos/create', [ProductosController::class, 'create']);
    Route::post('/productos', [ProductosController::class, 'store'])
        ->name('productos.store');
    Route::get('/productos/{id}/edit', [ProductosController::class, 'edit']);
    Route::delete('/productos/{id}', [ProductosController::class, 'destroy']);
    Route::put('/productos/{id}', [ProductosController::class, 'update'])
        ->name('productos.update');



});

require __DIR__.'/auth.php';
