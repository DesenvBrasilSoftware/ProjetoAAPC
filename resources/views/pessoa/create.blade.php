@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/pessoa.store" method="post">
  @csrf
  <div class="form-group">
    <input type="checkbox" name="cpfCnpj" id="cpfCnpj" data-toggle="toggle" data-on="Pessoa jurídica"
    data-off="Pessoa física" {{ old('cpfCnpj') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="cadPessoa" id="labelCpfCnpj">CPF:</label>
    <input type="text" name="cadPessoa" class="form-control" id="cadPessoa" maxlength="45"
      value="{{ old('cadPessoa') }}">
  </div>
  <div class="form-group">
    <label for="rg">RG:</label>
    <input type="text" name="rg" class="form-control" id="rg" maxlength="45"
      value="{{ old('rg') }}">
  </div>
  <div class="form-group">
    <label for="nome" id="labelNome">Nome:</label>
    <input required type="text" name="nome" class="form-control" id="nome" maxlength="120"
      value="{{ old('nome') }}" autofocus placeholder="Informe o nome">
  </div>
  <div class="form-group">
    <label for="data_cadastro">Data de cadastro:</label>
    <input required type="date" required class="form-control" id="data_cadastro" name="data_cadastro" placeholder="Insira a data de cadastro"
    value="{{ old('data_cadastro') }}">
  </div>
  <div class="row">
    <div class="col-md-2">
      <div class="form-group">
        <label for="colaborador">Colaborador:</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="colaborador" id="colaborador" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('colaborador') ? 'checked' : '' }}>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="profissional">Profissional:</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="profissional" id="profissional" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('profissional') ? 'checked' : '' }}>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="voluntario">Voluntário:</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="voluntario" id="voluntario" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('voluntario') ? 'checked' : '' }}>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="fornecedor">Fornecedor:</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="fornecedor" id="fornecedor" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('fornecedor') ? 'checked' : '' }}>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="clinica">Clínica:</label>
        <div class="checkbox-toggle">
          <input type="checkbox" name="clinica" id="clinica" data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('clinica') ? 'checked' : '' }}>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <a type="button" href="/pessoa.index" class="btn btn-warning">Fechar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function() {
      $("[data-toggle='toggle']").bootstrapToggle({
          size: "small",
      });
      $("#cpfCnpj").change(function() {
          if (!$(this).prop("checked")) {
              // Se CNPJ está selecionado, mude o texto do label para "Nome Fantasia"
              $("#labelNome").text("Nome fantasia");
              $("#labelCpfCnpj").text("CNPJ");
              $("#rg").prop("disabled", true);
          } else {
              // Se CPF está selecionado, volte para "Nome"
              $("#labelNome").text("Nome");
              $("#labelCpfCnpj").text("CPF");
              $("#rg").prop("disabled", false);
          }
      });
  });
</script>
@endsection
