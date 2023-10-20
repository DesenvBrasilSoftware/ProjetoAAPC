@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/paciente.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
  <div class="form-group">
    <label for="nome">Nome:</label>
    <input required type="text" name="nome" class="form-control" id="nome" maxlength="50"
      value="{{ $obj->nome }}" autofocus placeholder="Informe o nome">
  </div>
  <div class="form-group">
    <label for="data_nascimento">Data de nascimento:</label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="Informe a data de nascimento">
  </div>
  <div class="form-group">
    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" class="form-control" id="cpf" maxlength="11"
      value="{{ $obj->cpf }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');"
      placeholder="Informe o CPF">
  </div>
  <div class="form-group">
    <label for="rg">RG:</label>
    <input type="text" name="rg" class="form-control" id="rg" maxlength="20"
      value="{{ $obj->rg }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');"
      placeholder="Informe o RG">
  </div>
  <div class="form-group">
    <label for="data_cadastro">Data de cadastro:</label>
    <input required type="date" class="form-control" id="data_cadastro" name="data_cadastro" placeholder="Informe a data de cadastro">
  </div>
  <div class="form-group">
    <label for="sexo">Sexo:</label><br>
    <div class="form-check">
      <input class="form-check-input" required type="radio" name="sexo" id="masculino" value="0" {{ $obj->sexo == '0' ? 'checked' : '' }}>
      <label class="form-check-label" for="masculino">
      Masculino
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" required type="radio" name="sexo" id="feminino" value="1" {{ $obj->sexo == '1' ? 'checked' : '' }}>
      <label class="form-check-label" for="feminino">
      Feminino
      </label>
    </div>
  </div>
  <div class="form-group">
    <label for="quantidade_filhos">Quantidade de filhos:</label>
    <input type="text" name="quantidade_filhos" class="form-control" id="quantidade_filhos"
      value="{{ $obj->quantidade_filhos }}" autofocus
      placeholder="Digite a quantidade de filhos" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
  </div>
  <div class="form-group">
    <label for="estado_civil">Estado Civil:</label><br>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="solteiro" value="0" {{ $obj->estado_civil == '0' ? 'checked' : '' }}>
      <label class="form-check-label" for="solteiro">Solteiro</label>
    </div>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="casado" value="1" {{ $obj->estado_civil == '1' ? 'checked' : '' }}>
      <label class="form-check-label" for="casado">Casado</label>
    </div>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="separado" value="2" {{ $obj->estado_civil == '2' ? 'checked' : '' }}>
      <label class="form-check-label" for="separado">Separado</label>
    </div>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="divorciado" value="3" {{ $obj->estado_civil == '3' ? 'checked' : '' }}>
      <label class="form-check-label" for="divorciado">Divorciado</label>
    </div>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="viuvo" value="4" {{ $obj->estado_civil == '4' ? 'checked' : '' }}>
      <label class="form-check-label" for="viuvo">Viúvo</label>
    </div>
  </div>
  <div class="form-group">
    <label for="conjuge">Conjuge</label>
    <input type="text" name="conjuge" class="form-control" id="conjuge" maxlength="50"
      value="{{ $obj->conjuge }}" autofocus>
  </div>
  <div class="form-group">
    <label for="escolaridade">Escolaridade</label><br>
    <label>
    <input type="radio" name="escolaridade" id="ensinoMedio" value="0"
    {{ $obj->escolaridade == '0' ? 'checked' : '' }}>
    Ensino médio
    </label>
    <label>
    <input type="radio" name="escolaridade" id="superior" value="1"
    {{ $obj->escolaridade == '1' ? 'checked' : '' }}>
    Superior
    </label>
    <label>
    <input type="radio" name="escolaridade" id="mestrado" value="2"
    {{ $obj->escolaridade == '2' ? 'checked' : '' }}>
    Mestrado
    </label>
    <label>
    <input type="radio" name="escolaridade" id="doutorado" value="3"
    {{ $obj->escolaridade == '3' ? 'checked' : '' }}>
    Doutorado
    </label>
  </div>
  <div class="form-group">
    <label for="profissao">Profissão:</label>
    <input type="text" name="profissao" class="form-control" id="profissao" maxlength="45"
      value="{{ $obj->profissao }}" autofocus placeholder="Informe a profissão">
  </div>
  <div class="form-group">
    <label for="renda_mensal">Renda mensal:</label>
    <input type="number" step="0.01" name="renda_mensal" class="form-control" id="renda_mensal"
      value="{{ $obj->renda_mensal }}" autofocus placeholder="Informe a renda mensal">
  </div>
  <div class="form-group">
    <label for="observacao">Observação:</label>
    <input type="text" name="observacao" class "form-control" id="observacao"
      value="{{ $obj->observacao }}" autofocus placeholder="Insira alguma observação, se necessário">
  </div>
  <div class="form-group">
    <label for="cep">CEP:</label>
    <input type="text" name="cep" class="form-control" id="cep" maxlength="8"
      value="{{ $obj->cep }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');"
      placeholder="Informe o CEP (somente números)">
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
    <label for="bairro_id">Bairro:</label>
    <select name="bairro_id" class="form-control" id="bairro_id" maxlength="45">
      <option value="" label="Selecione o bairro..."></option>
      @foreach ($listaBairro as $bairro)
      <option value="{{ $bairro->id }}" label="{{ $bairro->nome }}"
      @if($obj->bairro_id == $bairro->id)
      selected
      @endif
      >{{ $bairro->nome }}</option>
      @endforeach
    </select>
  </div>
  <table id="dataTable" class="table table-stripped">
    <thead>
      <tr>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Acomodação</th>
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
          <a data-toggle="modal" data-target="#modalAcomodacaoPaciente" onclick="abreModalAcomodacaoPaciente(
            '{{ $acomodacaoPaciente->id }}',
            '{{ $acomodacaoPaciente->data_entrada }}',
            '{{ $acomodacaoPaciente->data_saida }}',
            '{{ $acomodacaoPaciente->acomodacao_id }}')
            "><i class="fa fa-edit"></i></a>
        </td>
        <td width="1%">
        <a onclick="deletarAcomodacaoPaciente('{{ $acomodacaoPaciente->id }}', '{{ $obj->id }}')">
            <i class="fa fa-trash"></i>
        </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="form-group">
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalAcomodacaoPaciente">
    Adicionar acomodação
    </button>
  </div>
  <div class="form-group">
    <a type="button" href="/paciente.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
<!-- Modal -->
<div class="modal fade" id="modalAcomodacaoPaciente" tabindex="-1" role="dialog" aria-labelledby="labelModalAcomodacao" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="labelModalAcomodacao">Adicionar acomodação do paciente</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form method="POST" action="/paciente.adicionarAcomodacao">
        <!-- Adicione um formulário aqui -->
        @csrf <!-- Adicione o token CSRF -->
        <div class="modal-body">
          <input id="acomodacao_paciente_id" type="hidden" name="acomodacao_paciente_id">
          <input id="paciente_id" type="hidden" name="paciente_id" value="{{ $obj->id }}">
          <div class="form-group">
            <label for="data_entrada_id">Entrada:</label>
            <input type="date" class="form-control" id="data_entrada_id" name="data_entrada_id" placeholder="Informe a data de entrada">
          </div>
          <div class="form-group">
            <label for="data_saida_id">Saída:</label>
            <input type="date" class="form-control" id="data_saida_id" name="data_saida_id" placeholder="Informe a data de saída">
          </div>
          <div class="form-group">
            <label for="acomodacao_id">Acomodação:</label>
            <select name="acomodacao_id" class="form-control" id="acomodacao_id" maxlength="45">
              <option value="" label="Selecione a acomodação..."></option>
              @foreach ($listaAcomodacao as $acomodacao)
              <option value="{{ $acomodacao->id }}" label="{{ $acomodacao->descricao }}"
                >{{ $acomodacao->descricao }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<form id="deletarAcomodacaoForm" method="POST" action="/paciente.deletarAcomodacao">
    @csrf
    <input type="hidden" name="delete_acomodacao_paciente_id" id="delete_acomodacao_paciente_id">
    <input type="hidden" name="delete_paciente_id" id="delete_paciente_id">
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#modalAcomodacaoPaciente').on('shown.bs.modal', function () {
    $('#data_entrada_id').trigger('focus');
  });

  function abreModalAcomodacaoPaciente(id, dataEntrada, dataSaida, acomodacao_id) {
    $('#modalAcomodacaoPaciente').on('shown.bs.modal', function () {
        $('#acomodacao_paciente_id').val(id);
        $('#data_entrada_id').val(dataEntrada);
        $('#data_saida_id').val(dataSaida);
        $('#acomodacao_id').val(acomodacao_id);

        $('#data_entrada_id').trigger('focus');
    });
  }

  function deletarAcomodacaoPaciente(acomodacao_paciente_id, paciente_id) {
        $('#delete_acomodacao_paciente_id').val(acomodacao_paciente_id);
        $('#delete_paciente_id').val(paciente_id);

        $('#deletarAcomodacaoForm').submit();
    }
</script>
@endsection
