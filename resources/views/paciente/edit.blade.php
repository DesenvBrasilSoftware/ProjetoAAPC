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
  <div class="form-group">
    <label for="nome">Nome:</label>
    <input required type="text" name="nome" class="form-control" id="nome" maxlength="50"
      value="{{ $obj->nome }}" autofocus placeholder="Informe o nome">
  </div>
  <div class="form-group">
    <label for="data_nascimento">Data de nascimento:</label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
      placeholder="Informe a data de nascimento" value="{{ $obj->data_nascimento }}">
  </div>
  <div class="form-group">
    <label for="data_obito">Data de óbito:</label>
    <input type="date" class="form-control" id="data_obito" name="data_obito"
      placeholder="Informe a data de óbito" value="{{ $obj->data_obito }}">
  </div>
  <div class="form-group">
    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" class="form-control cpf" id="cpf"
      value="{{ $obj->cpf }}" autofocuS
      placeholder="Informe o CPF...">
  </div>
  <div class="form-group">
    <label for="rg">RG:</label>
    <input type="text" name="rg" class="form-control rg" id="rg"
      value="{{ $obj->rg }}" autofocus
      placeholder="Informe o RG...">
  </div>
  <div class="form-group">
    <label>Sexo:</label><br>
    <div class="form-check">
      <input class="form-check-input" required type="radio" name="sexo" id="masculino" value="0"
      {{ $obj->sexo == '0' ? 'checked' : '' }}>
      <label class="form-check-label" for="masculino">
      Masculino
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" required type="radio" name="sexo" id="feminino" value="1"
      {{ $obj->sexo == '1' ? 'checked' : '' }}>
      <label class="form-check-label" for="feminino">
      Feminino
      </label>
    </div>
  </div>
  <div class="form-group">
    <label for="quantidade_filhos">Quantidade de filhos:</label>
    <input type="text" name="quantidade_filhos" class="form-control" id="quantidade_filhos"
      value="{{ $obj->quantidade_filhos }}" autofocus placeholder="Digite a quantidade de filhos"
      oninput="this.value = this.value.replace(/[^0-9]/g, '');">
  </div>
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
  <div class="form-group">
    <label for="conjuge">Cônjuge</label>
    <input type="text" name="conjuge" class="form-control" id="conjuge" maxlength="50"
      value="{{ $obj->conjuge }}" autofocus>
  </div>
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
  <div class="form-group">
    <label for="profissao">Profissão:</label>
    <input type="text" name="profissao" class="form-control" id="profissao" maxlength="45"
      value="{{ $obj->profissao }}" autofocus placeholder="Informe a profissão">
  </div>
  <div class="form-group">
    <label for="renda_mensal">Renda mensal:</label>
    <input required type="text" name="renda_mensal" class="form-control dinheiro" id="renda_mensal"
      value="{{ $obj->renda_mensal }}" autofocus placeholder="Informe a renda mensal...">
  </div>
  <div class="form-group">
    <label for="observacao">Observação:</label>
    <input type="text" name="observacao" class="form-control" id="observacao"
      value="{{ $obj->observacao }}" autofocus placeholder="Insira alguma observação, se necessário">
  </div>
  <div class="form-group">
    <label for="cep">CEP:</label>
    <input type="text" name="cep" class="form-control cep" id="cep"
      value="{{ $obj->cep }}" autofocus
      placeholder="Informe o CEP...">
  </div>
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
  <div class="form-group">
    <label for="bairro_id">Bairro:</label>
    <select required name="bairro_id" class="form-control" id="bairro_id" maxlength="45" onchange="handleSelectBairro()">
      <option value="" label="Selecione o bairro..."></option>
      @foreach ($listaBairro as $bairro)
      <option value="{{ $bairro->id }}" label="{{ $bairro->nome }}"
      @if ($obj->bairro_id == $bairro->id) selected @endif>{{ $bairro->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="logradouro">Logradouro:</label>
    <input type="text" name="logradouro" class="form-control" id="logradouro" maxlength="60"
      value="{{ $obj->logradouro }}" autofocus placeholder="Informe o logradouro">
  </div>
  <div class="form-group">
    <label for="numero">Número:</label>
    <input type="text" name="numero" class="form-control" id="numero" maxlength="6"
      value="{{ $obj->numero }}" autofocus placeholder="Informe o número">
  </div>
  <div class="form-group">
    <label for="complemento">Complemento:</label>
    <input type="text" name="complemento" class="form-control" id="complemento" maxlength="45"
      value="{{ $obj->complemento }}" autofocus placeholder="Informe o complemento (se houver)">
  </div>
  <div class="form-group">
    <label for="ponto_referencia">Ponto de referência:</label>
    <input type="text" name="ponto_referencia" class="form-control" id="ponto_referencia" maxlength="45"
      value="{{ $obj->ponto_referencia }}" autofocus placeholder="Informe um ponto de referência">
  </div>
  <div class="form-group">
    <label for="moradia">Moradia:</label>
    <select name="moradia" class="form-control" id="moradia" maxlength="45">
      <option value="" label="Nenhuma" {{ $obj->moradia ? '' : 'selected' }}></option>
      <option value="P" label="Própria" {{ $obj->moradia == 'P'? 'selected' : '' }}>Própria</option>
      <option value="A" label="Alugada" {{ $obj->moradia == 'A'? 'selected' : '' }}>Alugada</option>
    </select>
  </div>
  <div class="row">
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
  <div class="form-group pt-3" id="acompanhanteDiv">
    <label for="acompanhante" class="w-100 p-2 rounded"
      style="background-color: #999999a8">Acompanhante(s):</label>
    @if (count($listaAcompanhante) > 0)
    <table id="tabela-acompanhantes" class="table table-striped">
      <thead>
        <tr>
          <th>Acompanhante</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listaAcompanhante as $acompanhante)
        <tr>
          <td>{{ $acompanhante->nome_acompanhante }}</td>
          <td width="1%">
            <a href="/acompanhante.delete.{{ $acompanhante->id }}"><i
              class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    <div id="paciente-container">
      <select name="acompanhante" class="form-control" id="acompanhante">
        <option value="" label="Selecione um acompanhante..." selected></option>
        @foreach ($listaPessoa as $pessoa)
        <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}">{{ $pessoa->nome }}</option>
        @endforeach
      </select>
    </div>
    <button class="btn btn-sm btn-success mt-3" type="button" id="adicionar-acompanhante">Adicionar
    Acompanhante</button>
  </div>
  <div class="form-group pt-3" id="contatoDiv">
    <label for="contato" class="w-100 p-2 rounded"
      style="background-color: #999999a8">Contato(s):</label>
    @if (count($listaContato) > 0)
    <table id="tabela-contatos" class="table table-striped">
      <thead>
        <tr>
          <th>Contato</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($listaContato as $contato)
        <tr>
          <td>{{ $contato->nome_contato }}</td>
          <td width="1%">
            <a href="/contato.delete.{{ $contato->id }}"><i
              class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    <div id="paciente-container">
      <select name="contato" class="form-control" id="contato">
        <option value="" label="Selecione um contato..." selected></option>
        @foreach ($listaPessoa as $pessoa)
        <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}">{{ $pessoa->nome }}</option>
        @endforeach
      </select>
    </div>
    <button class="btn btn-sm btn-success mt-3" type="button" id="adicionar-contato">Adicionar
    Contato</button>
  </div>
  <table id="dataTable" class="table-responsive table-stripped table-bordered">
    <thead>
      <tr>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Acomodação</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($listaAcomodacaoPaciente as $acomodacaoPaciente)
      <tr>
        <td>
          {{ $acomodacaoPaciente->data_entrada }}
        </td>
        <td>
          {{ $acomodacaoPaciente->data_saida }}
        </td>
        <td>
          {{ $acomodacaoPaciente->acomodacao }}
        </td>
        <td width="1%">
          <a data-toggle="modal" data-target="#modalAcomodacaoPaciente"
            onclick="abreModalEditAcomodacaoPaciente(
            '{{ $acomodacaoPaciente->id }}',
            '{{ $acomodacaoPaciente->data_entrada }}',
            '{{ $acomodacaoPaciente->data_saida }}',
            '{{ $acomodacaoPaciente->acomodacao_id }}')
            ">
          <i class="fa fa-lg fa-edit"></i>
          </a>
        </td>
        <td width="1%">
          <a
            onclick="deletarAcomodacaoPaciente('{{ $acomodacaoPaciente->id }}', '{{ $obj->id }}')">
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
  <table id="dataTable" class="table-responsive table-stripped table-bordered">
    <thead>
      <tr>
        <th>Data Cadastro</th>
        <th>Enfermidade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($listaEnfermidadePaciente as $enfermidadePaciente)
      <tr>
        <td>
          {{ $enfermidadePaciente->data_cadastro }}
        </td>
        <td>
          {{ $enfermidadePaciente->enfermidade }}
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
  <table id="dataTable" class="table-responsive table-stripped table-bordered">
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
  <div class="form-group">
    <a type="button" href="/paciente.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
<!-- Colocar modais fora do form de edit -->
@include('paciente/modal_acomodacao')
@include('paciente/modal_enfermidade')
@include('paciente/modal_consulta')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

          const response = await fetch('/acompanhante.store.' + {{ $obj->id }} + '.' +
              acompanhanteId, {
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
  function handleSelectBairro() {
      var select_cidade = document.getElementById('cidade_id');
      var select_bairro = document.getElementById('bairro_id');
      var bairro_selecionado_id = select_bairro.value;

      var cidade_id = '';

      @foreach ($listaBairro as $bairro)
      var bairro_id = '{{$bairro->id}}'
          if (bairro_selecionado_id == bairro_id) {
              cidade_id = '{{$bairro->cidade_id}}';
          }
      @endforeach

      select_cidade.value = cidade_id;
  }

  function handleSelectCidade() {
      var select_cidade = document.getElementById('cidade_id');
      var select_bairro = document.getElementById('bairro_id');
      var cidade_selecionada_id = select_cidade.value;

      // Limpar opções anteriores
      while (select_bairro.options.length > 1) {
          select_bairro.remove(1);
      }

      // Adicionar opções de bairro com base na cidade selecionada ou mostrar todos
      @foreach ($listaBairro as $bairro)
          var option = document.createElement('option');
          option.value = '{{ $bairro->id }}';
          option.label = '{{ $bairro->nome }}';

          if ({{ $bairro->cidade_id }} == cidade_selecionada_id || cidade_selecionada_id === "") {
              select_bairro.add(option);
          }
      @endforeach
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(".cpf").mask("000.000.000-00");
  $(".rg").mask("00.000.000-0");
  $(".cep").mask("00.000-000");
  $(".dinheiro").mask("#.###.###.###.###.###,00", { reverse: true });
</script>
@endsection
