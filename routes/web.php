<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnfermidadeController;
use App\Http\Controllers\ClasseTerapeuticaController;
use App\Http\Controllers\BairroController;


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

// classe terapêutica
Route::get('/classeTerapeutica.index', [ClasseTerapeuticaController::class, 'index']);
Route::get('/classeTerapeutica.create', [ClasseTerapeuticaController::class, 'create']);
Route::get('/classeTerapeutica.retrieveAll', [ClasseTerapeuticaController::class, 'retrieveAll']);
Route::post('/classeTerapeutica.store', [ClasseTerapeuticaController::class, 'store']);
Route::get('/classeTerapeutica.delete.{i}', [ClasseTerapeuticaController::class, 'delete']);
Route::get('/classeTerapeutica.edit.{i}', [ClasseTerapeuticaController::class, 'edit']);

// Bairro
Route::get('/bairro.index', [BairroController::class, 'index']);
Route::get('/bairro.create', [BairroController::class, 'create']);
Route::get('/bairro.retrieveAll', [BairroController::class, 'retrieveAll']);
Route::post('/bairro.store', [BairroController::class, 'store']);
Route::get('/bairro.delete.{i}', [BairroController::class, 'delete']);
Route::get('/bairro.edit.{i}', [BairroController::class, 'edit']);
