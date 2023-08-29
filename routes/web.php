<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnfermidadeController;
use App\Http\Controllers\GrupoItemController;


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

