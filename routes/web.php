<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\PersonasController;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboardCategorias',[CategoriasController::class, 'index'])->name('dashboardCategorias');
    Route::get('/dashboardPersonas',[PersonasController::class, 'index'])->name('dashboardPersonas');

    Route::get('/categoria',[CategoriasController::class, 'añadir']);
    Route::post('/categoria',[CategoriasController::class, 'crear']);
    Route::get('/categoria/{categoria}', [CategoriasController::class, 'editar']);
    Route::post('/categoria/{categoria}', [CategoriasController::class, 'actualizar']);

    Route::get('/persona',[PersonasController::class, 'añadir']);
    Route::post('/persona',[PersonasController::class, 'crear']);
    Route::get('/persona/{persona}', [PersonasController::class, 'editar']);
    Route::post('/persona/{persona}', [PersonasController::class, 'actualizar']);
});
