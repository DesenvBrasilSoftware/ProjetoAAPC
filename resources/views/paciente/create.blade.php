@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/paciente.store" method="post">
  @csrf
  <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" id="nome" maxlength="50"
        value="{{ old('nome') }}" autofocus placeholder="Insira seu nome">
    </div>
    <div class="form-group">
        <label for="data_nascimento">Data de nascimento:</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="Insira sua data de nascimento">
    </div>
    <div class="form-group">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" class="form-control" id="cpf" maxlength="11"
        value="{{ old('cpf') }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');"
        placeholder="Informe o CPF">
    </div>
    <div class="form-group">
        <label for="rg">RG:</label>
        <input type="text" name "rg" class="form-control" id="rg" maxlength="20"
        value="{{ old('rg') }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');"
        placeholder="Informe o RG">
    </div>
    <div class="form-group">
        <label for="data_cadastro">Data de cadastro:</label>
        <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" placeholder="Insira a data de cadastro">
    </div>
  <div class="form-group">
    <label for="sexo">Sexo</label><br>
    <label>
    <input type="radio" name="sexo" id="masculino" value="0"
    {{ old('sexo') == '0' ? 'checked' : '' }}>
    Masculino
    </label>
    <label>
    <input type="radio" name="sexo" id="feminino" value="1"
    {{ old('sexo') == '1' ? 'checked' : '' }}>
    Feminino
    </label>
  </div>
  <div class="form-group">
    <label for="quantidade_filhos">Quantidade de filhos:</label>
    <input type="text" name="quantidade_filhos" class="form-control" id="quantidade_filhos"
        value="{{ old('quantidade_filhos') }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g,');"
        placeholder="Informe a quantidade de filhos">
  </div>
  <div class="form-group">
    <label for="estado_civil">Estado civil</label><br>
    <label>
    <input type="radio" name="estado_civil" id="solteiro" value="0"
    {{ old('estado_civil') == '0' ? 'checked' : '' }}>
    Solteiro
    </label>
    <label>
    <input type="radio" name="estado_civil" id="casado" value="1"
    {{ old('estado_civil') == '1' ? 'checked' : '' }}>
    Casado
    </label>
    <label>
    <input type="radio" name="estado_civil" id="separado" value="2"
    {{ old('estado_civil') == '2' ? 'checked' : '' }}>
    Separado
    </label>
    <label>
    <input type="radio" name="estado_civil" id="divorciado" value="3"
    {{ old('estado_civil') == '3' ? 'checked' : '' }}>
    Divorciado
    </label>
    <label>
    <input type="radio" name="estado_civil" id="viuvo" value="4"
    {{ old('estado_civil') == '4' ? 'checked' : '' }}>
    Viúvo
    </label>
  </div>
  <div class="form-group">
    <label for="conjuge">Conjuge</label>
    <input type="text" name="conjuge" class="form-control" id="conjuge" maxlength="50" placeholder="Digite o nome do cônjuge" value="{{ old('conjuge') }}" autofocus>
</div>

<div class="form-group">
    <label for="escolaridade">Escolaridade</label><br>
    <label>
        <input type="radio" name="escolaridade" id="ensinoMedio" value="0" {{ old('escolaridade') == '0' ? 'checked' : '' }}>
        Ensino médio
    </label>
    <label>
        <input type="radio" name="escolaridade" id="superior" value="1" {{ old('escolaridade') == '1' ? 'checked' : '' }}>
        Superior
    </label>
    <label>
        <input type="radio" name="escolaridade" id="mestrado" value="2" {{ old('escolaridade') == '2' ? 'checked' : '' }}>
        Mestrado
    </label>
    <label>
        <input type="radio" name="escolaridade" id="doutorado" value="3" {{ old('escolaridade') == '3' ? 'checked' : '' }}>
        Doutorado
    </label>
</div>

<div class="form-group">
    <label for="profissao">Profissão:</label>
    <input type="text" name="profissao" class="form-control" id="profissao" maxlength="45" placeholder="Digite a profissão" value="{{ old('profissao') }}" autofocus>
</div>

<div class="form-group">
    <label for="renda_mensal">Renda mensal:</label>
    <input type="number" step="0.01" name="renda_mensal" class="form-control" id="renda_mensal" placeholder="Digite a renda mensal" value="{{ old('renda_mensal') }}" autofocus>
</div>

<div class="form-group">
    <label for="observacao">Observação:</label>
    <input type="text" name="observacao" class="form-control" id="observacao" placeholder="Digite uma observação" value="{{ old('observacao') }}" autofocus>
</div>

<div class="form-group">
    <label for="cep">CEP:</label>
    <input type="text" name="cep" class="form-control" id="cep" maxlength="8" placeholder="Digite o CEP" value="{{ old('cep') }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');">
</div>

<div class="form-group">
    <label for="logradouro">Logradouro:</label>
    <input type="text" name="logradouro" class="form-control" id="logradouro" maxlength="60" placeholder="Digite o logradouro" value="{{ old('logradouro') }}" autofocus>
</div>

<div class="form-group">
    <label for="numero">Número:</label>
    <input type="text" name="numero" class="form-control" id="numero" maxlength="6" placeholder="Digite o número" value="{{ old('numero') }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g, '');">
</div>

<div class="form-group">
    <label for="complemento">Complemento:</label>
    <input type="text" name="complemento" class="form-control" id="complemento" maxlength="45" placeholder="Digite o complemento" value="{{ old('complemento') }}" autofocus>
</div>

<div class="form-group">
    <label for="ponto_referencia">Ponto de referência:</label>
    <input type="text" name="ponto_referencia" class="form-control" id="ponto_referencia" maxlength="45" placeholder="Digite um ponto de referência" value="{{ old('ponto_referencia') }}" autofocus>
</div>

<div class="form-group">
    <label for="bairro_id">Bairro:</label>
    <input type="text" name="bairro_id" class="form-control" id="bairro_id" placeholder="Digite o bairro" value="{{ old('bairro_id') }}" autofocus>
</div>

<div class="form-group">
    <a type="button" href="/paciente.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
</form>
@endsection
