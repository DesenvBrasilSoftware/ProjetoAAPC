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
    <label for="nome" id="labelNome">Nome:</label>
    <input required type="text" name="nome" class="form-control" id="nome" maxlength="120"
      value="{{ $obj->nome }}" readonly placeholder="Informe o nome da pessoa">
  </div>
  <div class="form-group">
    <label for="rg">RG:</label>
    <input type="text" name="rg" class="form-control" id="rg" maxlength="45"
      value="{{ $obj->rg }}" readonly>
  </div>
  <div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="colaborador">Colaborador:</label>
      <div class="checkbox-toggle">
        <input type="checkbox" name="colaborador" id="colaborador"
        data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->colaborador ? 'checked' : '' }}>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="profissional">Profissional:</label>
      <div class="checkbox-toggle">
        <input type="checkbox" name="profissional" id="profissional"
        data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->profissional ? 'checked' : '' }}>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="voluntario">Voluntário:</label>
      <div class="checkbox-toggle">
        <input type="checkbox" name="voluntario" id="voluntario"
        data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->voluntario ? 'checked' : '' }}>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="fornecedor">Fornecedor:</label>
      <div class="checkbox-toggle">
        <input type="checkbox" name="fornecedor" id="fornecedor"
        data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->fornecedor ? 'checked' : '' }}>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="clinica">Clínica:</label>
      <div class="checkbox-toggle">
        <input type="checkbox" name="clinica" id="clinica"
        data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->clinica ? 'checked' : '' }}>
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
