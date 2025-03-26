<?php

use App\Http\Controllers\IdTiposController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/bienvenida', function () {
//     return view('bienvenida');
// });
Route::get('/bienvenida', [ProductoController::class, 'bienvenida']);
Route::get('/bye', [ProductoController::class, 'bye']);
Route::get('/producto', [ProductoController::class, 'viewProducto']);
Route::get('/insertar', [ProductoController::class, 'viewInsertProd']);
Route::post('/insertar', [ProductoController::class, 'store'])->name('producto.insertproducto');
Route::get('categoria',[IdTiposController::class,'viewTipos']);
//Route::get('/tipo_producto', [Id_tiposController::class, 'viewTipos'])->name('producto.view__tipoP');
Route::post('/catagoria',[IdTiposController::class, 'storeTipo'])->name('insertarCategoria');