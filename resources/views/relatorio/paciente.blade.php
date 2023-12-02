@extends('template') @section('conteudo')
<form class="needs-validation" novalidate id="form" action="/relatorio.relatorioPacientes" method="post">
  @csrf
  <div class="form-group">
    <label for="data_inicial_nascimento">Filtro data inicial nascimento:</label>
    <input type="date" class="form-control" id="data_inicial_nascimento" name="data_inicial_nascimento" />
  </div>
  <div class="form-group">
    <label for="data_final_nascimento">Filtro data final nascimento:</label>
    <input type="date" class="form-control" id="data_final_nascimento" name="data_final_nascimento" />
  </div>
  <div class="form-group">
    <label for="data_inicial_cadastro">Filtro data inicial cadastro:</label>
    <input type="date" class="form-control" id="data_inicial_cadastro" name="data_inicial_cadastro" />
  </div>
  <div class="form-group">
    <label for="data_final_cadastro">Filtro data final cadastro:</label>
    <input type="date" class="form-control" id="data_final_cadastro" name="data_final_cadastro" />
  </div>
  <div class="form-group">
    <label for="data_inicial_obito">Filtro data inicial obito:</label>
    <input type="date" class="form-control" id="data_inicial_obito" name="data_inicial_obito" />
  </div>
  <div class="form-group">
    <label for="data_final_obito">Filtro data final obito:</label>
    <input type="date" class="form-control" id="data_final_obito" name="data_final_obito" />
  </div>
  <div class="form-group">
    <label for="cidade_id">Cidade:</label>
    <select name="cidade_id" class="form-control" id="cidade_id" maxlength="45">
      <option value="" label="Selecione a cidade..." selected></option>
      @foreach ($listaCidade as $cidade)
      <option value="{{ $cidade->id }}" label="{{ $cidade->nome }}">{{ $cidade->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-success">Gerar relatório</button>
  </div>
</form>
<script>
  let icon = document.getElementById("card-title-icon");
  let title = document.getElementById("card-title-title");
  icon.classList.add("bxs-spreadsheet");
  title.innerText = "Relatório de pacientes";
</script>
@endsection
