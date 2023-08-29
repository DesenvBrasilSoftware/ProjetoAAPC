<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnfermidadeController;
use App\Http\Controllers\ItemController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Enfermidade
Route::get('/enfermidade.index', [EnfermidadeController::class, 'index']);
Route::get('/enfermidade.create', [EnfermidadeController::class, 'create']);
Route::get('/enfermidade.retrieveAll', [EnfermidadeController::class, 'retrieveAll']);
Route::post('/enfermidade.store', [EnfermidadeController::class, 'store']);
Route::get('/enfermidade.delete.{i}', [EnfermidadeController::class, 'delete']);
Route::get('/enfermidade.edit.{i}', [EnfermidadeController::class, 'edit']);

// Itens
Route::get('/item.index', [ItemController::class, 'index']);
Route::get('/item.create', [ItemController::class, 'create']);
Route::get('/item.retrieveAll', [ItemController::class, 'retrieveAll']);
Route::post('/item.store', [ItemController::class, 'store']);
Route::get('/item.delete.{i}', [ItemController::class, 'delete']);
Route::get('/item.edit.{i}', [ItemController::class, 'edit']);

