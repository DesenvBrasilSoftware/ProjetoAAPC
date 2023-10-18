@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/paciente.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control" id="nome" maxlength="50"
      value="{{ $obj->nome }}" autofocus>
  </div>
  <div class="form-group">
    <label for="data_nascimento">Data de nascimento:</label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
  </div>
  <div class="form-group">
    <label for="cpf">CPF</label>
    <input type="text" name="cpf" class="form-control" id="cpf" maxlength="11"
      value="{{ $obj->cpf }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');">
  </div>
  <div class="form-group">
    <label for="rg">RG</label>
    <input type="text" name "rg" class="form-control" id="rg" maxlength="20"
      value="{{ $obj->rg }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');">
  </div>
  <div class="form-group">
    <label for="data_cadastro">Data de cadastro:</label>
    <input type="date" class="form-control" id="data_cadastro" name="data_cadastro">
  </div>
  <div class="form-group">
    <label for="sexo">Sexo</label><br>
    <label>
    <input type="radio" name="sexo" id="sexo_m" value="0"
    {{ $obj->sexo == '0' ? 'checked' : '' }}>
    Masculino
    </label>
    <label>
    <input type="radio" name="sexo" id="sexo_f" value="1"
    {{ $obj->sexo == '1' ? 'checked' : '' }}>
    Feminino
    </label>
  </div>
  <div class="form-group">
    <label for="quantidade_filhos">Quantidade de filhos</label>
    <input type="text" name="quantidade_filhos" class="form-control" id="quantidade_filhos"
      value="{{ $obj->quantidade_filhos }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');">
  </div>
  <div class="form-group">
    <label for="estado_civil">Estado civil</label><br>
    <label>
    <input type="radio" name="estado_civil" id="solteiro" value="0"
    {{ $obj->estado_civil == 'solteiro' ? 'checked' : '' }}>
    Solteiro
    </label>
    <label>
    <input type="radio" name="estado_civil" id="casado" value="1"
    {{ $obj->estado_civil == '0' ? 'checked' : '' }}>
    Casado
    </label>
    <label>
    <input type="radio" name="estado_civil" id="separado" value="2"
    {{ $obj->estado_civil == '1' ? 'checked' : '' }}>
    Separado
    </label>
    <label>
    <input type="radio" name="estado_civil" id="divorciado" value="3"
    {{ $obj->estado_civil == '2' ? 'checked' : '' }}>
    Divorciado
    </label>
    <label>
    <input type="radio" name="estado_civil" id="viuvo" value="4"
    {{ $obj->estado_civil == '3' ? 'checked' : '' }}>
    Viúvo
    </label>
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
    <label for="profissao">Profissão</label>
    <input type="text" name="profissao" class="form-control" id="profissao" maxlength="45"
      value="{{ $obj->profissao }}" autofocus>
  </div>
  <div class="form-group">
    <label for="renda_mensal">Renda mensal</label>
    <input type="number" step="0.01" name="renda_mensal" class="form-control" id="renda_mensal"
      value="{{ $obj->renda_mensal }}" autofocus>
  </div>
  <div class="form-group">
    <label for="observacao">Observação</label>
    <input type="text" name="observacao" class="form-control" id="observacao"
      value="{{ $obj->observacao }}" autofocus>
  </div>
  <div class="form-group">
    <label for="cep">CEP</label>
    <input type="text" name="cep" class="form-control" id="cep" maxlength="8"
      value="{{ $obj->cep }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');">
  </div>
  <div class="form-group">
    <label for="logradouro">Logradouro</label>
    <input type="text" name="logradouro" class="form-control" id="logradouro" maxlength="60"
      value="{{ $obj->logradouro }}" autofocus>
  </div>
  <div class="form-group">
    <label for="numero">Número</label>
    <input type="text" name="numero" class="form-control" id="numero" maxlength="6"
      value="{{ $obj->numero }}" autofocus>
  </div>
  <div class="form-group">
    <label for="complemento">Complemento</label>
    <input type="text" name="complemento" class="form-control" id="complemento" maxlength="45"
      value="{{ $obj->complemento }}" autofocus>
  </div>
  <div class="form-group">
    <label for="ponto_referencia">Ponto de referência</label>
    <input type="text" name="ponto_referencia" class="form-control" id="ponto_referencia" maxlength="45"
      value="{{ $obj->ponto_referencia }}" autofocus>
  </div>
  <div class="form-group">
    <label for="bairro_id">Bairro</label>
    <input type="text" name="bairro_id" class="form-control" id="bairro_id"
      value="{{ $obj->bairro_id }}" autofocus>
  </div>
  <button type="submit" class="btn btn-primary">Salvar</button>
  <a type="button" href="/paciente.index" class="btn btn-warning">Fechar</a>
</form>
@endsection
