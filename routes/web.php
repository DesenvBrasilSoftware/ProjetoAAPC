<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnfermidadeController;
use App\Http\Controllers\GrupoItemController;
use App\Http\Controllers\MedicamentoController;
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

// Grupo Item
Route::get('/grupoItem.index', [GrupoItemController::class, 'index']);
Route::get('/grupoItem.create', [GrupoItemController::class, 'create']);
Route::get('/grupoItem.retrieveAll', [GrupoItemController::class, 'retrieveAll']);
Route::post('/grupoItem.store', [GrupoItemController::class, 'store']);
Route::get('/grupoItem.delete.{i}', [GrupoItemController::class, 'delete']);
Route::get('/grupoItem.edit.{i}', [GrupoItemController::class, 'edit']);

// Medicamento
Route::get('/medicamento.index', [MedicamentoController::class, 'index']);
Route::get('/medicamento.create', [MedicamentoController::class, 'create']);
Route::get('/medicamento.retrieveAll', [MedicamentoController::class, 'retrieveAll']);
Route::post('/medicamento.store', [MedicamentoController::class, 'store']);
Route::get('/medicamento.delete.{i}', [MedicamentoController::class, 'delete']);
Route::get('/medicamento.edit.{i}', [MedicamentoController::class, 'edit']);
 
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
