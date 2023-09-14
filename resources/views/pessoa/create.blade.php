@extends('template')
@section('conteudo')
    <form id="form" action="/pessoa.store" method="post">
        @csrf
        <div class="row">
            <div class="form-group">
                <input type="checkbox" name="cpfCnpj" id="cpfCnpj" data-toggle="toggle" data-on="Pessoa física"
                    data-off="Pessoa jurídica" {{ old('cpfCnpj') ? 'checked' : '' }}>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="cadPessoa" id="labelCpfCnpj">CPF</label>
                <input type="text" name="cadPessoa" class="form-control" id="cadPessoa" maxlength="45"
                    value="{{ old('cadPessoa') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="nome" id="labelNome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" maxlength="120"
                    value="{{ old('nome') }}" autofocus>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="rg">RG</label>
                <input type="text" name="rg" class="form-control" id="rg" maxlength="45"
                    value="{{ old('rg') }}">
            </div>
        </div>
            {{-- Os Selects deverão ter os dados vindo de uma listagem dos dados requeridos --}}
        <div class="row">
            <div class="form-group">
                <label for="colaborador">Colaborador</label>
                <select name="colaborador" class="form-control" id="colaborador">
                    <option value="" label="Selecione um colaborador" selected></option>
                    <option value="1" label="Teste"></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="profissional">Profissional</label>
                <select name="profissional" class="form-control" id="profissional">
                    <option value="" label="Selecione um profissional" selected></option>
                    <option value="1" label="Teste"></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="voluntario">Voluntário</label>
                <select name="voluntario" class="form-control" id="voluntario">
                    <option value="" label="Selecione um voluntário" selected></option>
                    <option value="1" label="Teste"></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                <select name="fornecedor" class="form-control" id="fornecedor">
                    <option value="" label="Selecione um fornecedor" selected></option>
                    <option value="1" label="Teste"></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="clinica">Clínica</label>
                <select name="clinica" class="form-control" id="clinica">
                    <option value="" label="Selecione uma clínica" selected></option>
                    <option value="1" label="Teste"></option>
                </select>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="button" href="/pessoa.index" class="btn btn-warning">Fechar</a>
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
