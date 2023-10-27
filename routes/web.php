<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AcomodacaoController;
use App\Http\Controllers\AcompanhanteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ClasseTerapeuticaController;
use App\Http\Controllers\EnfermidadeController;
use App\Http\Controllers\GrupoItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RefeicaoController;

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

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () { return view('index'); });

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

    // Itens
    Route::get('/item.index', [ItemController::class, 'index']);
    Route::get('/item.create', [ItemController::class, 'create']);
    Route::get('/item.retrieveAll', [ItemController::class, 'retrieveAll']);
    Route::post('/item.store', [ItemController::class, 'store']);
    Route::get('/item.delete.{i}', [ItemController::class, 'delete']);
    Route::get('/item.edit.{i}', [ItemController::class, 'edit']);

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

    // Acomodações
    Route::get('/acomodacao.index', [AcomodacaoController::class, 'index']);
    Route::get('/acomodacao.create', [AcomodacaoController::class, 'create']);
    Route::get('/acomodacao.retrieveAll', [AcomodacaoController::class, 'retrieveAll']);
    Route::post('/acomodacao.store', [AcomodacaoController::class, 'store']);
    Route::get('/acomodacao.delete.{i}', [AcomodacaoController::class, 'delete']);
    Route::get('/acomodacao.edit.{i}', [AcomodacaoController::class, 'edit']);

    // Pessoa
    Route::get('/pessoa.index', [PessoaController::class, 'index']);
    Route::get('/pessoa.create', [PessoaController::class, 'create']);
    Route::get('/pessoa.retrieveAll', [PessoaController::class, 'retrieveAll']);
    Route::post('/pessoa.store', [PessoaController::class, 'store']);
    Route::get('/pessoa.delete.{i}', [PessoaController::class, 'delete']);
    Route::get('/pessoa.edit.{i}', [PessoaController::class, 'edit']);

    // Refeição
    Route::get('/refeicao.index', [RefeicaoController::class, 'index']);
    Route::get('/refeicao.create', [RefeicaoController::class, 'create']);
    Route::post('/refeicao.store', [RefeicaoController::class, 'store']);
    Route::get('/refeicao.edit.{i}', [RefeicaoController::class, 'edit']);
    Route::get('/refeicao.delete.{i}', [RefeicaoController::class, 'delete']);
    Route::get('/refeicao.servir.{i}', [RefeicaoController::class, 'servirRefeicao']);

    // Paciente
    Route::get('/paciente.index', [PacienteController::class, 'index']);
    Route::get('/paciente.create', [PacienteController::class, 'create']);
    Route::get('/paciente.retrieveAll', [PacienteController::class, 'retrieveAll']);
    Route::post('/paciente.store', [PacienteController::class, 'store']);
    Route::get('/paciente.delete.{i}', [PacienteController::class, 'delete']);
    Route::get('/paciente.edit.{i}', [PacienteController::class, 'edit']);
    Route::post('/paciente.adicionarAcomodacao', [PacienteController::class, 'adicionarAcomodacao']);
    Route::post('/paciente.deletarAcomodacao', [PacienteController::class, 'deletarAcomodacao']);
    Route::post('/paciente.adicionarEnfermidade', [PacienteController::class, 'adicionarEnfermidade']);
    Route::post('/paciente.deletarEnfermidade', [PacienteController::class, 'deletarEnfermidade']);

    // Acompanhante
    Route::get('/acompanhantes/{id}', [AcompanhanteController::class, 'index']);
    Route::post('/acompanhante.store.{pacienteId}.{acompanhanteId}', [AcompanhanteController::class, 'store']);
    Route::get('/acompanhante.delete.{i}', [AcompanhanteController::class, 'delete']);
});
