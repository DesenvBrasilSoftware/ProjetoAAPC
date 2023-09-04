<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnfermidadeController;
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

// Bairro
Route::get('/bairro.index', [BairroController::class, 'index']);
Route::get('/bairro.create', [BairroController::class, 'create']);
Route::get('/bairro.retrieveAll', [BairroController::class, 'retrieveAll']);
Route::post('/bairro.store', [BairroController::class, 'store']);
Route::get('/bairro.delete.{i}', [BairroController::class, 'delete']);
Route::get('/bairro.edit.{i}', [BairroController::class, 'edit']);
