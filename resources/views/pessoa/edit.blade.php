@extends('template')
@section('conteudo')
<form class="needs-validation" novalidate id="form" action="/pessoa.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
  <div class="form-group">
    <input type="checkbox" name="cpfCnpj"
    id="cpfCnpj" data-toggle="toggle" data-on="Pessoa jurídica"
    data-off="Pessoa física" {{ $obj->cnpj ? '' : 'checked' }}>
  </div>
  <div id="cpfGroup">
    <div class="form-group">
      <label for="cpf" id="labelCpfCnpj">CPF:</label>
      <input type="text" name="cpf" placeholder="000.000.000-00"
      class="form-control cpf" id="cpf" maxlength="45" value="{{ $obj->cpf }}" />
    </div>
    <div class="form-group">
      <label for="rg">RG:</label>
      <input type="text" name="rg" class="form-control rg" placeholder="00.000.000-0"
       id="rg" maxlength="45" value="{{ $obj->rg }}" />
    </div>
    <div class="form-group">
      <label for="nome" id="labelNome">Nome:</label>
      <input required type="text" name="nome" class="form-control" id="nome" maxlength="120" value="{{ $obj->nome }}" autofocus placeholder="Informe o Nome..." />
    </div>
  </div>
  <div id="cnpjGroup">
    <div class="form-group">
      <label for="cnpj" id="labelCpfCnpj">CNPJ:</label>
      <input type="text" name="cnpj" placeholder="00.000.000/0000-00" class="form-control cnpj"
      id="cnpj" maxlength="45" value="{{ $obj->cnpj }}" />
    </div>
    <div class="form-group" id="cnpjGroup">
      <label for="nomeFantasia" id="labelNome">Nome Fantasia:</label>
      <input type="text" name="nomeFantasia" class="form-control" id="nomeFantasia" maxlength="120" value="{{ $obj->nome }}" placeholder="Informe o Nome Fantasia..." />
    </div>
  </div>
  <div class="form-group">
    <label for="data_cadastro">Data de cadastro:</label>
    <input required type="date" class="form-control" id="data_cadastro" name="data_cadastro"
        placeholder="Informe a data de cadastro" value="{{ $obj->data_cadastro }}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $(".cnpj").mask("00.000.000/0000-00");
  $(".cpf").mask("000.000.000-00");
  $(".rg").mask("00.000.000-0");
</script>
<script>
  $(document).ready(function () {
    $("#cpfGroup").hide();
    $("#cnpjGroup").hide();

    if ($("#cpfCnpj").prop("checked")) {
      $("#cpfGroup").show();
    } else {
      $("#cnpjGroup").show();
    }

    $("#cpfCnpj").change(function () {
      if ($(this).prop("checked")) {
        $("#cpfGroup").show();
        $("#cnpjGroup").hide();
      } else {
        $("#cnpjGroup").show();
        $("#cpfGroup").hide();
      }
    });
  });
</script>
@endsection
