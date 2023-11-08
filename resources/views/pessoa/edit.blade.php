@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/pessoa.store" method="post">
  @csrf
  <div class="form-group">
    <input type="checkbox" name="cpfCnpj" id="cpfCnpj" data-toggle="toggle" data-on="Pessoa física"
    data-off="Pessoa jurídica" {{ $obj->cnpj ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="cpf/cnpj" id="labelCpfCnpj">CPF</label>
    <input type="text" name="cpf/cnpj" class="form-control" id="fornecedor" maxlength="45"
      value="{{ $obj->cpf ? $obj->cpf : $obj->cnpj }}" readonly>
  </div>
  <div class="form-group">
    <label for="nome" id="labelNome">Nome</label>
    <input type="text" name="nome" class="form-control" id="nome" maxlength="120"
      value="{{ $obj->nome }}" readonly>
  </div>
  <div class="form-group">
    <label for="rg">RG</label>
    <input type="text" name="rg" class="form-control" id="rg" maxlength="45"
      value="{{ $obj->rg }}" readonly>
  </div>
  <div class="form-group">
    <label for="colaborador">Colaborador</label>
    <select name="colaborador" class="form-control" id="colaborador">
      <option value="" label="Selecione um colaborador"></option>
      <option value="{{ $obj->colaborador }}" label="{{ $obj->colaborador }}" selected></option>
    </select>
  </div>
  <div class="form-group">
    <label for="profissional">Profissional</label>
    <select name="profissional" class="form-control" id="profissional">
      <option value="" label="Selecione um profissional" selected></option>
      <option value="{{ $obj->profissional }}" label="{{ $obj->profissional }}" selected></option>
    </select>
  </div>
  <div class="form-group">
    <label for="voluntario">Voluntário</label>
    <select name="voluntario" class="form-control" id="voluntario">
      <option value="" label="Selecione um voluntário" selected></option>
      <option value="{{ $obj->voluntario }}" label="{{ $obj->voluntario }}" selected></option>
    </select>
  </div>
  <div class="form-group">
    <label for="fornecedor">Fornecedor</label>
    <select name="fornecedor" class="form-control" id="fornecedor">
      <option value="" label="Selecione um fornecedor" selected></option>
      <option value="{{ $obj->fornecedor }}" label="{{ $obj->fornecedor }}" selected></option>
    </select>
  </div>
  <div class="form-group">
    <label for="clinica">Clínica</label>
    <select name="clinica" class="form-control" id="clinica">
      <option value="" label="Selecione uma clínica" selected></option>
      <option value="{{ $obj->clinica }}" label="{{ $obj->clinica }}" selected></option>
    </select>
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
          if ($(this).prop("checked")) {
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
