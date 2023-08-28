<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnfermidadeController;
use App\Http\Controllers\CidadeController;


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

// Cidade
Route::get('/cidade.index', [CidadeController::class, 'index']);
Route::get('/cidade.create', [CidadeController::class, 'create']);
Route::get('/cidade.retrieveAll', [CidadeController::class, 'retrieveAll']);
Route::post('/cidade.store', [CidadeController::class, 'store']);
Route::get('/cidade.delete.{i}', [CidadeController::class, 'delete']);
Route::get('/cidade.edit.{i}', [CidadeController::class, 'edit']);

