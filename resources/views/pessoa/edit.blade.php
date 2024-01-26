@extends('template')

@section('conteudo')
  <form class="needs-validation" novalidate id="form" action="/pessoa.store" method="post">
    @csrf

    <div class="d-flex" style="flex-direction: column;">
      <input type="hidden" id="id" name="id" value="{{ $obj->id }}">

      <div class="form-group">
        <input type="checkbox" name="cpfCnpj"
        id="cpfCnpj" data-toggle="toggle" data-on="Pessoa física"
        data-off="Pessoa jurídica" {{ $obj->cnpj ? '' : 'checked' }}>
      </div>

      <div id="cpfGroup">
        <div class="form-group">
          <label for="cpf" id="labelCpfCnpj">CPF:</label>
          <input type="text" name="cpf" placeholder="000.000.000-00"
          class="form-control cpf" id="cpf" maxlength="45" value="{{ $obj->cpf }}" />
        </div>

        <div class="form-group">
          <label for="rg">RG:</label>
          <input type="text" name="rg" class="form-control" placeholder="00.000.000-0"
          id="rg" maxlength="15" value="{{ $obj->rg }}" />
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
        <input required type="date" class="form-control" id="data_cadastro" name="data_cadastro" placeholder="Informe a data de cadastro" value="{{ $obj->data_cadastro }}">

        <label for="telefone" id="labelTelefone">Telefone:</label>
        <input type="text" name="telefone" placeholder="00 00000-0000" class="form-control telefone" id="telefone" maxlength="50" value="{{ $obj->telefone }}" />
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="colaborador">Colaborador:</label>
            <div class="checkbox-toggle">
              <input type="checkbox" name="colaborador" id="colaborador"
              data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->colaborador ? 'checked' : '' }}>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="profissional">Profissional:</label>
            <div class="checkbox-toggle">
              <input type="checkbox" name="profissional" id="profissional"
              data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->profissional ? 'checked' : '' }}>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="voluntario">Voluntário:</label>
            <div class="checkbox-toggle">
              <input type="checkbox" name="voluntario" id="voluntario"
              data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->voluntario ? 'checked' : '' }}>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="fornecedor">Fornecedor:</label>
            <div class="checkbox-toggle">
              <input type="checkbox" name="fornecedor" id="fornecedor"
              data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->fornecedor ? 'checked' : '' }}>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="clinica">Clínica:</label>
            <div class="checkbox-toggle">
              <input type="checkbox" name="clinica" id="clinica"
              data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->clinica ? 'checked' : '' }}>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="acompanhante">Acompanhante:</label>
            <div class="checkbox-toggle">
              <input type="checkbox" name="acompanhante" id="acompanhante"
              data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->acompanhante ? 'checked' : '' }}>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label for="contato">Contato:</label>
            <div class="checkbox-toggle">
              <input type="checkbox" name="contato" id="contato"
              data-toggle="toggle" data-on="Sim" data-off="Não" {{ $obj->contato ? 'checked' : '' }}>
            </div>
          </div>
        </div>
      </div>

      <div class="my-4 bg-dark w-auto" style="height: 1px"></div>

      <div class="form-group">
        <button
          id="btnAdicionarAcomodacao"
          onclick="abreModalAcomodacaoAcompanhante()"
          type="button"
          class="btn btn-secondary"
          data-toggle="modal"
          data-target="#modalAcomodacaoAcompanhante"
        >
          Adicionar acomodação
        </button>
      </div>

      @if(isset($listaLeitoAcompanhante) && !empty($listaLeitoAcompanhante))
        <div >
          <table id="dataTable" class="display table-responsive">
            <thead>
              <tr>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Acomodação</th>
                <th>Leito</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($listaLeitoAcompanhante as $leitoAcompanhante)
              <tr>
                <td>
                  {{ $leitoAcompanhante->data_entrada }}
                </td>
                <td>
                  {{ $leitoAcompanhante->data_saida }}
                </td>
                <td>
                  {{ $leitoAcompanhante->acomodacao }}
                </td>
                <td>
                  {{ $leitoAcompanhante->leito }}
                </td>
                <td width="1%">
                  <a data-toggle="modal" data-target="#modalAcomodacaoAcompanhante"
                  @if($leitoAcompanhante->data_saida != null) class="disabled-link" @endif
                  onclick="abreModalEditAcomodacaoAcompanhante(
                  '{{ $leitoAcompanhante->id }}',
                  '{{ $leitoAcompanhante->data_entrada }}',
                  '{{ $leitoAcompanhante->data_saida }}',
                  '{{ $leitoAcompanhante->acomodacao_id }}',
                  '{{ $leitoAcompanhante->leito_id }}'
                  )">
                  <i class="fa fa-lg fa-edit"></i>
                  </a>
                </td>
                <td width="1%">
                  <a
                    onclick="deletarAcomodacaoAcompanhante('{{ $leitoAcompanhante->id }}', '{{ $obj->id }}')">
                  <i class="fa fa-lg fa-trash"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif

      <div class="my-4 bg-dark w-auto" style="height: 1px"></div>

      <div class="form-group">
        <a type="button" href="/pessoa.index" class="btn btn-warning">Fechar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>

    </div>
  </form>

  @include('pessoa/modal_acomodacao')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <script>
    $(".cnpj").mask("00.000.000/0000-00");
    $(".cpf").mask("000.000.000-00");

    $('.telefone').mask('00 00000-0000');
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

      $('#acompanhante').change(function () {
      if ($(this).prop('checked')) {
        $('#btnAdicionarAcomodacao').show();
      } else {
        $('#btnAdicionarAcomodacao').hide();
      }
    });
    });
  </script>
@endsection
