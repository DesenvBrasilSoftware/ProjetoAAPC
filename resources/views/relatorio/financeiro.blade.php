@extends('template') @section('conteudo')
<form class="needs-validation" novalidate id="form" action="/relatorio.relatorioFinanceiro" method="post">
  @csrf
  <div class="form-group">
    <label for="tipo_relatorio">Selecione o tipo de relatório:</label>
    <select required class="form-control" name="tipo_relatorio" id="tipo_relatorio">
      <option value="contas_a_pagar">Contas a pagar</option>
      <option value="contas_a_receber">Contas a receber</option>
    </select>
  </div>
  <div class="form-group">
    <label for="data_inicial">Filtro data inicial:</label>
    <input type="date" class="form-control" id="data_inicial" name="data_inicial" />
  </div>
  <div class="form-group">
    <label for="data_final">Filtro data final:</label>
    <input type="date" class="form-control" id="data_final" name="data_final" />
  </div>
  <div class="form-group">
    <label for="pessoa_id">Pessoa:</label>
    <select name="pessoa_id" class="form-control" id="pessoa_id" maxlength="45">
      <option value="" label="Selecione a pessoa..." selected></option>
      @foreach ($listaPessoa as $pessoa)
      <option value="{{ $pessoa->id }}" label="{{ $pessoa->nome }}">{{ $pessoa->nome }}</option>
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
  title.innerText = "Relatório do financeiro";
</script>
@endsection
