@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/paciente.store" method="post">
  @csrf
  <div class="form-group">
    <label for="data_cadastro">Data de cadastro:</label>
    <input required type="date" required class="form-control" id="data_cadastro" name="data_cadastro"
      value="{{ now()->toDateString() }}" readonly>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" id="nome" maxlength="50"
          required value="{{ old('nome') }}" autofocus>
      </div>
    </div>
    <div  class="col-md-4">
      <div class="form-group">
        <label for="data_nascimento">Data de nascimento:</label>
        <input required type="date" class="form-control" id="data_nascimento" name="data_nascimento">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label for="cpf" id="labelCpfCnpj">CPF:</label>
        <input type="text" name="cpf"
          class="form-control cpf" required id="cpf" maxlength="45" value="{{ old('cpf') }}" />
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="rg">RG:</label>
        <input type="text" name="rg" class="form-control"
          id="rg" required maxlength="15" value="{{ old('rg') }}" />
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
          <label for="sexo">Sexo:</label>
          <select class="form-control" id="sexo" name="sexo" required>
            <option value="" selected disabled></option>
            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Feminino</option>
          </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="cidade_id">Cidade:</label>
        <select required name="cidade_id" class="form-control" id="cidade_id" maxlength="45" onchange="handleSelectCidade()">
          <option value="" selected></option>
          @foreach ($listaCidade as $cidade)
          <option value="{{ $cidade->id }}" label="{{ $cidade->nome }}">{{ $cidade->nome }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-8">
      <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input required type="text" name="endereco" class="form-control" id="endereco" maxlength="60"
        value="{{ old('endereco') }}" autofocus>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="cep">CEP:</label>
        <input type="text" name="cep" class="form-control cep"
          id="cep" maxlength="8" value="{{ old('cep') }}"
          autofocus>
      </div>
    </div>
    <div class="col-md-8">
      <div class="form-group">
        <label for="bairro">Bairro:</label>
        <input type="text" name="bairro" class="form-control" id="bairro" maxlength="60" value="{{ old('bairro') }}" autofocus>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="complemento">Complemento:</label>
        <input type="text" name="complemento" class="form-control" id="complemento" maxlength="45" value="{{ old('complemento') }}" autofocus>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="ponto_referencia">Ponto de referência:</label>
        <input type="text" name="ponto_referencia" class="form-control" id="ponto_referencia" maxlength="45" value="{{ old('ponto_referencia') }}" autofocus>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="moradia">Moradia:</label>
        <select name="moradia" class="form-control" id="moradia" maxlength="45">
          <option value="" label="Nenhuma" selected></option>
          <option value="P" label="Própria" >Própria</option>
          <option value="A" label="Alugada" >Alugada</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="quantidade_filhos">Quantidade de filhos:</label>
        <input type="text" name="quantidade_filhos" class="form-control" id="quantidade_filhos"
          value="{{ old('quantidade_filhos') }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g,');">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="estado_civil">Estado Civil:</label>
        <select name="estado_civil" class="form-control" id="estado_civil" maxlength="45">
          <option value="" label="Nenhum" selected></option>
          <option value="1" label="Solteiro" >Solteiro</option>
          <option value="2" label="Casado" >Casado</option>
          <option value="3" label="Convivio" >Convivio</option>
          <option value="4" label="Viúvo" >Viúvo</option>
          <option value="5" label="Separado" >Separado</option>
        </select>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label for="conjuge">Cônjuge</label>
        <input type="text" name="conjuge" class="form-control" id="conjuge" maxlength="50"
        value="{{ old('conjuge') }}" autofocus>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="escolaridade">Escolaridade:</label>
        <select name="escolaridade" class="form-control" id="escolaridade" maxlength="45">
          <option value="" label="" selected ></option>
          <option value="1" label="Fundamental Incompleto" >Fundamental Incompleto</option>
          <option value="2" label="Fundamental completo" >Fundamental completo</option>
          <option value="3" label="Médio Incompleto" >Médio Incompleto</option>
          <option value="4" label="Médio completo" >Médio completo</option>
          <option value="5" label="Superior incompleto" >Superior incompleto</option>
          <option value="6" label="Superior completo" >Superior completo</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="profissao">Profissão:</label>
        <input type="text" name="profissao" class="form-control" id="profissao" maxlength="45" value="{{ old('profissao') }}" autofocus>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="telefone" id="labelTelefone">Telefone:</label>
        <input type="text" name="telefone" class="form-control telefone"
        id="telefone" maxlength="50" value="{{ old('telefone') }}" />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="data_obito">Data de óbito:</label>
        <input type="date" class="form-control" id="data_obito" name="data_obito">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="data_biopsia">Data de Biopsia:</label>
        <input type="date" class="form-control" id="data_biopsia" name="data_biopsia">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="data_alta">Data de Alta:</label>
        <input type="date" class="form-control" id="data_alta" name="data_alta">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="medicamentos">Medicamentos:</label>
        <input type="text" name="medicamentos" class="form-control" id="medicamentos" maxlength="60" value="{{ old('medicamentos') }}" autofocus>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="clinica">Clínica:</label>
        <input type="text" name="clinica" class="form-control" id="clinica" maxlength="60" value="{{ old('clinica') }}" autofocus>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="observacao">Observação:</label>
    <input type="text" name="observacao" class="form-control" id="observacao" value="{{ old('observacao') }}" autofocus>
  </div>
  <div class="row">
  <div class="col-md-2">
      <div class="form-group">
        <label for="vulnerabilidade">Vulnerabilidade:</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="vulnerabilidade" id="vulnerabilidade" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('vulnerabilidade') ? 'checked' : '' }}>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="aposentado">Aposentado(a):</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="aposentado" id="aposentado" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('aposentado') ? 'checked' : '' }}>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-check form-switch">
        <label for="radio">Radioterapia:</label>
          <input type="checkbox" class="form-check-input" name="radio" id="radio" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('radio') ? 'checked' : '' }}>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-check form-switch">
        <label for="quimio">Quimioterapia:</label>
          <input type="checkbox" class="form-check-input" name="quimio" id="quimio" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('quimio') ? 'checked' : '' }}>
      </div>
    </div>
  </div>
  <div class="d-flex form-group justify-content-end">
    <a type="button" href="/paciente.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary mx-2">Salvar</button>
  </div>
</form>
<script></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(".cpf").mask("000.000.000-00");

  $(".cep").mask("00.000-000");
  $('.telefone').mask('00 00000-0000');
  $(".dinheiro").mask("#.###.###.###.###.###,00", { reverse: true });
</script>
@endsection
