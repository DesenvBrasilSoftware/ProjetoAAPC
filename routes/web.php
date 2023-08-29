<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnfermidadeController;
use App\Http\Controllers\MedicamentoController;


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

// Medicamento
Route::get('/medicamento.index', [MedicamentoController::class, 'index']);
Route::get('/medicamento.create', [MedicamentoController::class, 'create']);
Route::get('/medicamento.retrieveAll', [MedicamentoController::class, 'retrieveAll']);
Route::post('/medicamento.store', [MedicamentoController::class, 'store']);
Route::get('/medicamento.delete.{i}', [MedicamentoController::class, 'delete']);
Route::get('/medicamento.edit.{i}', [MedicamentoController::class, 'edit']);
