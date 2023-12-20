@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/paciente.store" method="post">
  @csrf
  <div class="form-group">
    <label for="data_cadastro">Data de cadastro:</label>
    <input required type="date" required class="form-control" id="data_cadastro" name="data_cadastro" placeholder="Insira a data de cadastro"
    value="{{ now()->toDateString() }}" readonly>
  </div>
  <div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" class="form-control" id="nome" maxlength="50"
      required value="{{ old('nome') }}" autofocus placeholder="Informe o Nome do Paciente...">
  </div>
  <div class="form-group">
    <label for="data_nascimento">Data de nascimento:</label>
    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="Insira sua data de nascimento">
  </div>
  <div class="form-group">
    <label for="data_obito">Data de óbito:</label>
    <input type="date" class="form-control" id="data_obito" name="data_obito" placeholder="Insira a data de óbito">
  </div>
  <div class="form-group">
    <label for="data_biopsia">Data de Biopsia:</label>
    <input type="date" class="form-control" id="data_biopsia" name="data_biopsia" placeholder="Insira a data de biopsia">
  </div>
  <div class="form-group">
    <label for="data_alta">Data de Alta:</label>
    <input type="date" class="form-control" id="data_alta" name="data_alta" placeholder="Insira a data de alta">
  </div>
  <div class="form-group">
      <label for="cpf" id="labelCpfCnpj">CPF:</label>
      <input type="text" name="cpf" placeholder="Informe o CPF..."
      class="form-control cpf" id="cpf" maxlength="45" value="{{ old('cpf') }}" />
    </div>
    <div class="form-group">
      <label for="rg">RG:</label>
      <input type="text" name="rg" class="form-control rg" placeholder="Informe o RG..."
       id="rg" maxlength="45" value="{{ old('rg') }}" />
    </div>
  <div class="form-group">
    <label for="sexo">Sexo:</label><br>
    <div class="form-check">
      <input class="form-check-input" required type="radio" name="sexo" id="masculino" value="0" {{ old('sexo') == '0' ? 'checked' : '' }}>
      <label class="form-check-label" for="masculino">
      Masculino
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" required type="radio" name="sexo" id="feminino" value="1" {{ old('sexo') == '1' ? 'checked' : '' }}>
      <label class="form-check-label" for="feminino">
      Feminino
      </label>
    </div>
  </div>
  <div class="form-group">
    <label for="quantidade_filhos">Quantidade de filhos:</label>
    <input required type="text" name="quantidade_filhos" class="form-control" id="quantidade_filhos"
      value="{{ old('quantidade_filhos') }}" autofocus oninput="this.value = this.value.replace(/[^0-9]/g,');"
      placeholder="Informe a quantidade de filhos...">
  </div>
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
  <div class="form-group">
    <label for="conjuge">Cônjuge</label>
    <input type="text" name="conjuge" class="form-control" id="conjuge" maxlength="50" placeholder="Digite o nome do cônjuge" value="{{ old('conjuge') }}" autofocus>
  </div>
  <div class="form-group">
    <label for="escolaridade">Escolaridade:</label>
    <select name="escolaridade" class="form-control" id="escolaridade" maxlength="45">
      <option value="" label="Nenhuma" selected >Nenhuma</option>
      <option value="1" label="Fundamental Incompleto" >Fundamental Incompleto</option>
      <option value="2" label="Fundamental completo" >Fundamental completo</option>
      <option value="3" label="Médio Incompleto" >Médio Incompleto</option>
      <option value="4" label="Médio completo" >Médio completo</option>
      <option value="5" label="Superior incompleto" >Superior incompleto</option>
      <option value="6" label="Superior completo" >Superior completo</option>
    </select>
  </div>
  <div class="form-group">
    <label for="profissao">Profissão:</label>
    <input type="text" name="profissao" class="form-control" id="profissao" maxlength="45" placeholder="Digite a profissão" value="{{ old('profissao') }}" autofocus>
  </div>
  <div class="form-group">
    <label for="renda_mensal">Renda mensal:</label>
    <input required type="text" name="renda_mensal" class="form-control dinheiro" id="renda_mensal"
    placeholder="Digite a renda mensal" value="{{ old('renda_mensal') }}" autofocus>
  </div>
  <div class="form-group">
    <label for="cep">CEP:</label>
    <input type="text" name="cep" class="form-control cep"
    id="cep" maxlength="8" placeholder="Digite o CEP" value="{{ old('cep') }}"
    autofocus>
  </div>
  <div class="form-group">
    <label for="cidade_id">Cidade:</label>
    <select required name="cidade_id" class="form-control" id="cidade_id" maxlength="45" onchange="handleSelectCidade()">
      <option value="" label="Selecione a cidade..." selected></option>
      @foreach ($listaCidade as $cidade)
      <option value="{{ $cidade->id }}" label="{{ $cidade->nome }}">{{ $cidade->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
     <label for="bairro">Bairro:</label>
    <input type="text" name="bairro" class="form-control" id="bairro" maxlength="60" placeholder="Digite o bairro" value="{{ old('bairro') }}" autofocus>
  </div>
  <div class="form-group">
    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" class="form-control" id="endereco" maxlength="60" placeholder="Digite o endereço" value="{{ old('endereco') }}" autofocus>
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
    <label for="moradia">Moradia:</label>
    <select name="moradia" class="form-control" id="moradia" maxlength="45">
      <option value="" label="Nenhuma" selected></option>
      <option value="P" label="Própria" >Própria</option>
      <option value="A" label="Alugada" >Alugada</option>
    </select>
  </div>
  <div class="form-group">
     <label for="medicamentos">Medicamentos:</label>
    <input type="text" name="medicamentos" class="form-control" id="medicamentos" maxlength="60" placeholder="Medicamentos..." value="{{ old('medicamentos') }}" autofocus>
  </div>
  <div class="form-group">
     <label for="clinica">Clinica:</label>
    <input type="text" name="clinica" class="form-control" id="clinica" maxlength="60" placeholder="Clinica..." value="{{ old('clinica') }}" autofocus>
  </div>
  <div class="form-group">
     <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" class="form-control" id="telefone" maxlength="40" placeholder="Digite o telefone" value="{{ old('telefone') }}" autofocus>
  </div>
  <div class="form-group">
    <label for="observacao">Observação:</label>
    <input type="text" name="observacao" class="form-control" id="observacao" placeholder="Digite uma observação" value="{{ old('observacao') }}" autofocus>
  </div>
  <div class="row">
    <div class="col-md-2">
        <div class="form-group">
          <label for="radio">Radioterapia:</label>
          <div class="checkbox-toggle">
            <input type="checkbox" name="radio" id="radio" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('radio') ? 'checked' : '' }}>
          </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
          <label for="quimio">Quimioterapia:</label>
          <div class="checkbox-toggle">
            <input type="checkbox" name="quimio" id="quimio" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('quimio') ? 'checked' : '' }}>
          </div>
        </div>
    </div>
  </div>
  <div class="d-flex form-group justify-content-end">
    <a type="button" href="/paciente.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary mx-2">Salvar</button>
  </div>
</form>
<script>

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
