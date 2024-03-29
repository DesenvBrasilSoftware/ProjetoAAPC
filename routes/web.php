<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AcomodacaoController;
use App\Http\Controllers\AcompanhanteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ClasseTerapeuticaController;
use App\Http\Controllers\EnfermidadeController;
use App\Http\Controllers\GrupoItemController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\EntradaDoacaoController;
use App\Http\Controllers\SaidaDoacaoController;
use App\Http\Controllers\SaidaConsumoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\RefeicaoController;
use App\Http\Controllers\ContasAPagarController;
use App\Http\Controllers\ContasAReceberController;

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
Route::get('/', function () { return view('portal'); });

Route::middleware(['auth'])->group(function () {

    Route::get('/app', function () { return view('index'); });

    // Relatorios
    Route::get('/relatorio.financeiro', [RelatorioController::class, 'financeiro']);
    Route::get('/relatorio.pacientes', [RelatorioController::class, 'pacientes']);
    Route::get('/relatorio.estoque', [RelatorioController::class, 'estoque']);
    Route::post('/relatorio.relatorioFinanceiro', [RelatorioController::class, 'relatorioFinanceiro']);
    Route::post('/relatorio.relatorioPacientes', [RelatorioController::class, 'relatorioPacientes']);
    Route::post('/relatorio.relatorioEstoque', [RelatorioController::class, 'relatorioEstoque']);

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
    Route::post('/item.adicionarKitItem', [ItemController::class, 'adicionarKitItem']);
    Route::post('/item.deletarKitItem', [ItemController::class, 'deletarKitItem']);

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
    Route::post('/acomodacao.adicionarLeito', [AcomodacaoController::class, 'adicionarLeito']);
    Route::post('/acomodacao.deletarLeito', [AcomodacaoController::class, 'deletarLeito']);

    // Pessoa
    Route::get('/pessoa.index', [PessoaController::class, 'index']);
    Route::get('/pessoa.create', [PessoaController::class, 'create']);
    Route::get('/pessoa.retrieveAll', [PessoaController::class, 'retrieveAll']);
    Route::post('/pessoa.store', [PessoaController::class, 'store']);
    Route::get('/pessoa.delete.{i}', [PessoaController::class, 'delete']);
    Route::get('/pessoa.edit.{i}', [PessoaController::class, 'edit']);

    // Entrada Doação
    Route::get('/entradaDoacao.index', [EntradaDoacaoController::class, 'index']);
    Route::get('/entradaDoacao.create', [EntradaDoacaoController::class, 'create']);
    Route::get('/entradaDoacao.retrieveAll', [EntradaDoacaoController::class, 'retrieveAll']);
    Route::post('/entradaDoacao.store', [EntradaDoacaoController::class, 'store']);
    Route::get('/entradaDoacao.delete.{i}', [EntradaDoacaoController::class, 'delete']);
    Route::get('/entradaDoacao.edit.{i}', [EntradaDoacaoController::class, 'edit']);
    Route::post('/entradaDoacao.adicionarItem', [EntradaDoacaoController::class, 'adicionarItem']);
    Route::post('/entradaDoacao.deletarItem', [EntradaDoacaoController::class, 'deletarItem']);

    // Saída Consumo
    Route::get('/saidaConsumo.index', [SaidaConsumoController::class, 'index']);
    Route::get('/saidaConsumo.create', [SaidaConsumoController::class, 'create']);
    Route::get('/saidaConsumo.retrieveAll', [SaidaConsumoController::class, 'retrieveAll']);
    Route::post('/saidaConsumo.store', [SaidaConsumoController::class, 'store']);
    Route::get('/saidaConsumo.delete.{i}', [SaidaConsumoController::class, 'delete']);
    Route::get('/saidaConsumo.edit.{i}', [SaidaConsumoController::class, 'edit']);
    Route::post('/saidaConsumo.adicionarItem', [SaidaConsumoController::class, 'adicionarItem']);
    Route::post('/saidaConsumo.deletarItem', [SaidaConsumoController::class, 'deletarItem']);

    // Saída Doação
    Route::get('/saidaDoacao.index', [SaidaDoacaoController::class, 'index']);
    Route::get('/saidaDoacao.create', [SaidaDoacaoController::class, 'create']);
    Route::get('/saidaDoacao.retrieveAll', [SaidaDoacaoController::class, 'retrieveAll']);
    Route::post('/saidaDoacao.store', [SaidaDoacaoController::class, 'store']);
    Route::get('/saidaDoacao.delete.{i}', [SaidaDoacaoController::class, 'delete']);
    Route::get('/saidaDoacao.edit.{i}', [SaidaDoacaoController::class, 'edit']);
    Route::post('/saidaDoacao.adicionarItem', [SaidaDoacaoController::class, 'adicionarItem']);
    Route::post('/saidaDoacao.deletarItem', [SaidaDoacaoController::class, 'deletarItem']);

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
    Route::post('/paciente.adicionarConsulta', [PacienteController::class, 'adicionarConsulta']);
    Route::post('/paciente.deletarConsulta', [PacienteController::class, 'deletarConsulta']);

    // Acompanhante
    Route::get('/acompanhantes/{id}', [AcompanhanteController::class, 'index']);
    Route::post('/acompanhante.store', [AcompanhanteController::class, 'store']);
    Route::post('/acompanhante.adicionarAcomodacao', [AcompanhanteController::class, 'adicionarAcomodacao']);
    Route::post('/acompanhantente.deletarAcomodacao', [AcompanhanteController::class, 'deletarAcomodacao']);
    Route::get('/acompanhante.delete.{i}', [AcompanhanteController::class, 'delete']);

    // Usuário
    Route::get('/usuario.index', [UsuarioController::class, 'index']);
    Route::get('/usuario.create', [UsuarioController::class, 'create']);
    Route::get('/usuario.edit.{i}', [UsuarioController::class, 'edit']);
    Route::post('/usuario.store', [UsuarioController::class, 'store']);
    Route::get('/usuario.delete.{i}', [UsuarioController::class, 'delete']);
    Route::get('/verificaLogin', [UsuarioController::class, 'verificaLogin']);
    // Contato
    Route::get('/contatos/{id}', [ContatoController::class, 'index']);
    Route::post('/contato.store.{pacienteId}.{contatoId}', [ContatoController::class, 'store']);
    Route::get('/contato.delete.{i}', [ContatoController::class, 'delete']);

    // Contas a pagar
    Route::get('/contasAPagar.index', [ContasAPagarController::class, 'index']);
    Route::get('/contasAPagar.create', [ContasAPagarController::class, 'create']);
    Route::post('/contasAPagar.store', [ContasAPagarController::class, 'store']);
    Route::get('/contasAPagar.edit.{i}', [ContasAPagarController::class, 'edit']);
    Route::get('/contasAPagar.delete.{i}', [ContasAPagarController::class, 'delete']);

    // Contas a receber
    Route::get('/contasAReceber.index', [ContasAReceberController::class, 'index']);
    Route::get('/contasAReceber.create', [ContasAReceberController::class, 'create']);
    Route::post('/contasAReceber.store', [ContasAReceberController::class, 'store']);
    Route::get('/contasAReceber.edit.{i}', [ContasAReceberController::class, 'edit']);
    Route::get('/contasAReceber.delete.{i}', [ContasAReceberController::class, 'delete']);
});
