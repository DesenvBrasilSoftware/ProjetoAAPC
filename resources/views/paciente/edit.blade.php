<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/paciente.store" method="post">
  @csrf
  <div class="form-group">
    <label for="data_cadastro">Data de cadastro:</label>
    <input required type="date" class="form-control" id="data_cadastro" name="data_cadastro"
      placeholder="Informe a data de cadastro" value="{{ $obj->data_cadastro }}" readonly>
  </div>
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
  <div class="row">
    <div class="col-md-8">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input required type="text" name="nome" class="form-control" id="nome" maxlength="50"
          value="{{ $obj->nome }}" autofocus placeholder="Informe o nome">
      </div>
    </div>
    <div  class="col-md-4">
      <div class="form-group">
        <label for="data_nascimento">Data de nascimento:</label>
        <input required type="date" class="form-control" id="data_nascimento" name="data_nascimento"
          placeholder="Informe a data de nascimento" value="{{ $obj->data_nascimento }}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" class="form-control cpf" id="cpf"
          value="{{ $obj->cpf }}" autofocus required
          placeholder="Informe o CPF...">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="rg">RG:</label>
        <input type="text" name="rg" class="form-control" id="rg"
          value="{{ $obj->rg }}" autofocus max-length="15" required
          placeholder="Informe o RG...">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="sexo">Sexo:</label>
        <select class="form-control" id="sexo" name="sexo" required>
        <option value="M" {{ $obj->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
        <option value="F" {{ $obj->sexo == 'F' ? 'selected' : '' }}>Feminino</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="cidade_id">Cidade:</label>
        <select required name="cidade_id" class="form-control" id="cidade_id" maxlength="45" onchange="handleSelectCidade()">
          <option value="" label="Selecione a cidade..."></option>
          @foreach ($listaCidade as $cidade)
          <option value="{{ $cidade->id }}" label="{{ $cidade->nome }}"
          @if ($obj->cidade_id == $cidade->id) selected @endif>{{ $cidade->nome }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-8">
      <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input required type="text" name="endereco" class="form-control" id="endereco" maxlength="60"
          value="{{ $obj->endereco }}" autofocus placeholder="Informe o endereço">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="cep">CEP:</label>
        <input type="text" name="cep" class="form-control cep" id="cep"
          value="{{ $obj->cep }}" autofocus
          placeholder="Informe o CEP...">
      </div>
    </div>
    <div class="col-md-8">
      <div class="form-group">
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" class="form-control" id="bairro" maxlength="60" placeholder="Digite o bairro" value="{{ $obj->bairro }}" autofocus>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="complemento">Complemento:</label>
        <input type="text" name="complemento" class="form-control" id="complemento" maxlength="45"
          value="{{ $obj->complemento }}" autofocus placeholder="Informe o complemento (se houver)">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="ponto_referencia">Ponto de referência:</label>
        <input type="text" name="ponto_referencia" class="form-control" id="ponto_referencia" maxlength="45"
          value="{{ $obj->ponto_referencia }}" autofocus placeholder="Informe um ponto de referência">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="moradia">Moradia:</label>
        <select name="moradia" class="form-control" id="moradia" maxlength="45">
        <option value="" label="Nenhuma" {{ $obj->moradia ? '' : 'selected' }}></option>
        <option value="P" label="Própria" {{ $obj->moradia == 'P'? 'selected' : '' }}>Própria</option>
        <option value="A" label="Alugada" {{ $obj->moradia == 'A'? 'selected' : '' }}>Alugada</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="quantidade_filhos">Quantidade de filhos:</label>
        <input type="text" name="quantidade_filhos" class="form-control" id="quantidade_filhos"
          value="{{ $obj->quantidade_filhos }}" autofocus placeholder="Digite a quantidade de filhos"
          oninput="this.value = this.value.replace(/[^0-9]/g, '');">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="estado_civil">Estado Civil:</label>
        <select name="estado_civil" class="form-control" id="estado_civil" maxlength="45">
        <option value="" label="Nenhum" {{ $obj->estado_civil ? '' : 'selected' }}></option>
        <option value="1" label="Solteiro" {{ $obj->estado_civil == 1? 'selected' : '' }}>Solteiro</option>
        <option value="2" label="Casado" {{ $obj->estado_civil == 2? 'selected' : '' }}>Casado</option>
        <option value="3" label="Convivio" {{ $obj->estado_civil == 3? 'selected' : '' }}>Convivio</option>
        <option value="4" label="Viúvo" {{ $obj->estado_civil == 4? 'selected' : '' }} >Viúvo</option>
        <option value="5" label="Separado" {{ $obj->estado_civil == 5? 'selected' : '' }}>Separado</option>
        </select>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label for="conjuge">Cônjuge</label>
        <input type="text" name="conjuge" class="form-control" id="conjuge" maxlength="50"
          value="{{ $obj->conjuge }}" autofocus>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="escolaridade">Escolaridade:</label>
        <select name="escolaridade" class="form-control" id="escolaridade" maxlength="45">
        <option value="" label="Nenhuma" {{ $obj->escolaridade ? '' : 'selected' }} >Nenhuma</option>
        <option value="1" label="Fundamental Incompleto" {{ $obj->escolaridade == 1? 'selected' : '' }}>Fundamental Incompleto</option>
        <option value="2" label="Fundamental completo" {{ $obj->escolaridade == 2? 'selected' : '' }}>Fundamental completo</option>
        <option value="3" label="Médio Incompleto" {{ $obj->escolaridade == 3? 'selected' : '' }}>Médio Incompleto</option>
        <option value="4" label="Médio completo" {{ $obj->escolaridade == 4? 'selected' : '' }}>Médio completo</option>
        <option value="5" label="Superior incompleto" {{ $obj->escolaridade == 5? 'selected' : '' }}>Superior incompleto</option>
        <option value="6" label="Superior completo" {{ $obj->escolaridade == 6? 'selected' : '' }}>Superior completo</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="profissao">Profissão:</label>
        <input type="text" name="profissao" class="form-control" id="profissao" maxlength="45"
          value="{{ $obj->profissao }}" autofocus placeholder="Informe a profissão">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="telefone" id="labelTelefone">Telefone:</label>
        <input type="text" name="telefone" placeholder="00 00000-0000" class="form-control telefone"
          id="telefone" maxlength="50" value="{{ $obj->telefone }}" />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="data_obito">Data de óbito:</label>
        <input type="date" class="form-control" id="data_obito" name="data_obito"
          placeholder="Informe a data de óbito" value="{{ $obj->data_obito }}">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="data_biopsia">Data de Biopsia:</label>
        <input type="date" class="form-control" id="data_biopsia" name="data_biopsia" placeholder="Insira a data de biopsia"  value="{{ $obj->data_biopsia }}">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="data_alta">Data de Alta:</label>
        <input type="date" class="form-control" id="data_alta" name="data_alta" placeholder="Insira a data de alta"  value="{{ $obj->data_alta }}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="medicamentos">Medicamentos:</label>
        <input type="text" name="medicamentos" class="form-control" id="medicamentos" maxlength="60" placeholder="Medicamentos..." value="{{ $obj->medicamento }}" autofocus>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="clinica">Clinica:</label>
        <input type="text" name="clinica" class="form-control" id="clinica" maxlength="60" placeholder="Clinica..." value="{{ $obj->clinica }}" autofocus>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="observacao">Observação:</label>
    <input type="text" name="observacao" class="form-control" id="observacao"
      value="{{ $obj->observacao }}" autofocus placeholder="Digite uma observação...">
  </div>
  <div class="row">
    <div class="col-md-2">
      <div class="form-group">
        <label for="vulnerabilidade">Vulnerabilidade:</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="vulnerabilidade" id="vulnerabilidade" data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->vulnerabilidade_social ? 'checked' : '' }}>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="aposentado">Aposentado(a):</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="aposentado" id="aposentado" data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->aposentado ? 'checked' : '' }}>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="radio">Radioterapia:</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="radio" id="radio" data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->radioterapia ? 'checked' : '' }}>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="quimio">Quimioterapia:</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="quimio" id="quimio" data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->quimioterapia ? 'checked' : '' }}>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group" style="border: 1px solid #ced4da; border-radius: 6px; padding: 0px 16px; background-color: #f7f7f7c9">
    <table id="tabela-acompanhantes" class="table">
      <thead>
        <tr>
          <th>Acompanhante</th>
          <th>Grau</th>
          <th>Profissão</th>
          <th>Telefone</th>
          <th>Mora com Paciente</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listaAcompanhantesPaciente as $acompanhante)
        <tr>
          <td>{{ $acompanhante->nome_acompanhante }}</td>
          <td>{{ $acompanhante->grau }}</td>
          <td>{{ $acompanhante->profissao }}</td>
          <td>{{ $acompanhante->telefone_acompanhante }}</td>
          <td>{{ $acompanhante->moradia == 1? 'Sim' : 'Não' }}</td>
          <td style="text-align: center" width="1%">
            <a data-toggle="modal"
              onclick="abreModalEditAcompanhante(
              '{{ $acompanhante->id }}',
              '{{ $acompanhante->grau }}',
              '{{ $acompanhante->profissao }}',
              '{{ $acompanhante->telefone_acompanhante }}',
              '{{ $acompanhante->moradia }}')
              ">
            <i class="fa fa-lg fa-edit"></i>
            </a>
          </td>
          <td style="text-align: center" width="1%">
            <a href="/acompanhante.delete.{{ $acompanhante->id }}"><i
              class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="col-md-10">
        <div class="form-group">
          <select name="acompanhante" class="form-control select2" id="acompanhante">
            <option value="" selected>Selecione um acompanhante...</option>
            @foreach ($listaPessoaAcompanhante as $pessoa)
            <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}">{{ $pessoa->nome }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <button style="width: 100%;" id="adicionar-acompanhante" type="button" class="btn btn-success" data-toggle="modal">
          Adicionar
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group" style="border: 1px solid #ced4da; border-radius: 6px; padding: 0px 16px; background-color: #f7f7f7c9">
    <table id="tabela-contatos" class="table">
      <thead>
        <tr>
          <th>Contato</th>
          <th>Telefone</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listaContatosPaciente as $contato)
        <tr>
          <td>{{ $contato->nome_contato }}</td>
          <td>{{ $contato->telefone_contato }}</td>
          <td style="text-align: center" width="1%">
            <a href="/contato.delete.{{ $contato->id }}"><i
              class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="col-md-10">
        <div class="form-group">
          <select name="contato" class="form-control select2" id="contato">
            <option value="" selected>Selecione um contato...</option>
            @foreach ($listaPessoaContato as $pessoa)
            <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}">{{ $pessoa->nome }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <button style="width: 100%" class="btn btn-success" type="button" id="adicionar-contato">Adicionar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group" style="border: 1px solid #ced4da; border-radius: 6px; padding: 0px 16px; background-color: #f7f7f7c9">
    <table id="tabela-contatos" class="table">
      <thead>
        <tr>
          <th>Acomodação</th>
          <th>Leito</th>
          <th>Entrada</th>
          <th>Saída</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listaLeitoPaciente as $leitoPaciente)
        <tr>
          <td>
            {{ $leitoPaciente->acomodacao }}
          </td>
          <td>
            {{ $leitoPaciente->leito }}
          </td>
          <td>
            {{ $leitoPaciente->data_entrada }}
          </td>
          <td>
            {{ $leitoPaciente->data_saida }}
          </td>
          <td width="1%">
            <a data-toggle="modal" data-target="#modalAcomodacaoPaciente"
            @if($leitoPaciente->data_saida != null) class="disabled-link" @endif
            onclick="abreModalEditAcomodacaoPaciente(
            '{{ $leitoPaciente->id }}',
            '{{ $leitoPaciente->data_entrada }}',
            '{{ $leitoPaciente->data_saida }}',
            '{{ $leitoPaciente->acomodacao_id }}',
            '{{ $leitoPaciente->leito_id }}'
            )">
            <i class="fa fa-lg fa-edit"></i>
            </a>
          </td>
          <td width="1%">
            <a
              onclick="deletarAcomodacaoPaciente('{{ $leitoPaciente->id }}', '{{ $obj->id }}')">
            <i class="fa fa-lg fa-trash"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="form-group">
      <button onclick="abreModalAcomodacaoPaciente()" type="button" class="btn btn-secondary" data-toggle="modal"
        data-target="#modalAcomodacaoPaciente">
      Adicionar acomodação
      </button>
    </div>
  </div>
  <div class="form-group" style="border: 1px solid #ced4da; border-radius: 6px; padding: 0px 16px; background-color: #f7f7f7c9">
    <table id="tabela-contatos" class="table">
      <thead>
        <tr>
          <th>Enfermidade</th>
          <th>Data Cadastro</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listaEnfermidadePaciente as $enfermidadePaciente)
        <tr>
          <td>
            {{ $enfermidadePaciente->enfermidade }}
          </td>
          <td>
            {{ date('d/m/Y', strtotime($enfermidadePaciente->data_cadastro)) }}
          </td>
          <td width="1%">
            <a data-toggle="modal" data-target="#modalEnfermidadePaciente"
              onclick="abreModalEditEnfermidadePaciente(
              '{{ $enfermidadePaciente->id }}',
              '{{ $enfermidadePaciente->data_cadastro }}',
              '{{ $enfermidadePaciente->enfermidade_id }}')
              "><i
              class="fa fa-lg fa-edit"></i></a>
          </td>
          <td width="1%">
            <a
              onclick="deletarEnfermidadePaciente('{{ $enfermidadePaciente->id }}', '{{ $obj->id }}')">
            <i class="fa fa-lg fa-trash"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="form-group">
      <button onclick="abreModalEnfermidadePaciente()" type="button" class="btn btn-secondary"
        data-toggle="modal" data-target="#modalEnfermidadePaciente">
      Cadastrar enfermidade
      </button>
    </div>
  </div>
  <div class="form-group" style="border: 1px solid #ced4da; border-radius: 6px; padding: 0px 16px; background-color: #f7f7f7c9">
    <table id="tabela-contatos" class="table">
      <thead>
        <tr>
          <th>Data Consulta</th>
          <th>Profissional</th>
          <th>Realizada</th>
          <th>Observações</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listaConsultaPaciente as $consultaPaciente)
        <tr>
          <td>
            {{ $consultaPaciente->data_consulta }}
          </td>
          <td>
            {{ $consultaPaciente->profissional }}
          </td>
          <td>
            {{ $consultaPaciente->realizada ? 'Sim' : 'Não' }}
          </td>
          <td style="max-width: 264px; word-wrap: break-word;">
            {{ $consultaPaciente->observacoes }}
          </td>
          <td width="1%">
            <a data-toggle="modal" data-target="#modalConsultaPaciente"
              onclick="abreModalEditConsultaPaciente(
              '{{ $consultaPaciente->id }}',
              '{{ $consultaPaciente->data_consulta }}',
              '{{ $consultaPaciente->pessoa_id }}',
              '{{ $consultaPaciente->realizada }}',
              '{{ $consultaPaciente->observacoes }}')
              "><i
              class="fa fa-lg fa-edit"></i></a>
          </td>
          <td width="1%">
            <a onclick="deletarConsultaPaciente('{{ $consultaPaciente->id }}', '{{ $obj->id }}')">
            <i class="fa fa-lg fa-trash"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="form-group">
      <button onclick="abreModalConsultaPaciente()" type="button" class="btn btn-secondary" data-toggle="modal"
        data-target="#modalConsultaPaciente">
      Cadastrar consulta
      </button>
    </div>
  </div>
  <div class="form-group">
    <a type="button" href="/paciente.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
<!-- Colocar modais fora do form de edit -->
@include('paciente/modal_acomodacao')
@include('paciente/modal_enfermidade')
@include('paciente/modal_consulta')
@include('paciente/modal_acompanhante')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
      toastr.options = {
          closeButton: true,
          progressBar: true,
          positionClass: 'toast-top-right'
      };

      const adicionarAcompanhate = document.getElementById("adicionar-acompanhante");
      const selectAcompanhante = document.getElementById("acompanhante");

      adicionarAcompanhate.addEventListener("click", async function() {
          const acompanhanteId = selectAcompanhante.value;

          if (acompanhanteId == "") {
              toastr.error('Selecione uma pessoa para acompanhante.', 'Erro');
              return;
          }
          else{

            abreModalAcompanhante(acompanhanteId);
          }
          // const response = await fetch('/acompanhante.store.' + {{ $obj->id }} + '.' +
          //     acompanhanteId, {
          //         method: 'POST',
          //         headers: {
          //             'X-CSRF-TOKEN': '{{ csrf_token() }}',
          //             'Content-Type': 'application/json',
          //         },
          //     });

          // if (response.ok) {
          //     const data = await response.json();
          //     toastr.success(data.message, 'Sucesso');
          //     window.location.href = '/paciente.edit.' + {{ $obj->id }};
          // } else {
          //     const data = await response.json();
          //     toastr.error(data.message, 'Erro');
          // }
      });

      const adicionarContato = document.getElementById("adicionar-contato");
      const selectContato = document.getElementById("contato");

      adicionarContato.addEventListener("click", async function() {
          const contatoId = selectContato.value;

          if (contatoId == "") {
              toastr.error('Selecione uma pessoa para contato.', 'Erro');
              return;
          }

          const response = await fetch('/contato.store.' + {{ $obj->id }} + '.' +
              contatoId, {
                  method: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}',
                      'Content-Type': 'application/json',
                  },
              });

          if (response.ok) {
              const data = await response.json();
              toastr.success(data.message, 'Sucesso');
              window.location.href = '/paciente.edit.' + {{ $obj->id }};
          } else {
              const data = await response.json();
              toastr.error(data.message, 'Erro');
          }
      });
  });
</script>
<script>
  $(".cpf").mask("000.000.000-00");

  $(".cep").mask("00.000-000");
  $('.telefone').mask('00 00000-0000');
  $(".dinheiro").mask("#.###.###.###.###.###,00", { reverse: true });
</script>
<style>
  .disabled-link {
  pointer-events: none; /* Desabilita interações do mouse e do teclado */
  opacity: 0.6; /* Adiciona uma opacidade para indicar que está desativado */
  }
  td {
  padding: 0px 8px !important;
  vertical-align: middle !important;
  background-color: white;
  }
  tbody {
    border-radius: 0 0 6px 6px;
  }
</style>
@endsection
