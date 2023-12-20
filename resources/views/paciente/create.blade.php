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
    <label for="estado_civil">Estado Civil:</label><br>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="solteiro" value="0" {{ old('estado_civil') == '0' ? 'checked' : '' }}>
      <label class="form-check-label" for="solteiro">Solteiro</label>
    </div>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="casado" value="1" {{ old('estado_civil') == '1' ? 'checked' : '' }}>
      <label class="form-check-label" for="casado">Casado</label>
    </div>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="separado" value="2" {{ old('estado_civil') == '2' ? 'checked' : '' }}>
      <label class="form-check-label" for="separado">Separado</label>
    </div>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="divorciado" value="3" {{ old('estado_civil') == '3' ? 'checked' : '' }}>
      <label class="form-check-label" for="divorciado">Divorciado</label>
    </div>
    <div class="form-check">
      <input required class="form-check-input" type="radio" name="estado_civil" id="viuvo" value="4" {{ old('estado_civil') == '4' ? 'checked' : '' }}>
      <label class="form-check-label" for="viuvo">Viúvo</label>
    </div>
  </div>
  <div class="form-group">
    <label for="conjuge">Cônjuge</label>
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
    <label for="bairro_id">Bairro:</label>
    <select required name="bairro_id" class="form-control" id="bairro_id" maxlength="45" onchange="handleSelectBairro()">
      <option value="" label="Selecione o bairro..." selected></option>
      @foreach ($listaBairro as $bairro)
      <option value="{{ $bairro->id }}" label="{{ $bairro->nome }}" data-cidade-id="{{ $bairro->cidade_id }}">{{ $bairro->nome }}</option>
      @endforeach
    </select>
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
    <label for="moradia">Moradia:</label>
    <select name="moradia" class="form-control" id="moradia" maxlength="45">
      <option value="" label="Nenhuma" selected></option>
      <option value="P" label="Própria" >Própria</option>
      <option value="A" label="Alugada" >Alugada</option>
    </select>
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
