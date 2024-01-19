@extends('template') @section('conteudo')
<form class="needs-validation" novalidate id="form" action="/relatorio.relatorioEstoque" method="post">
  @csrf
  <div class="form-group">
    <label for="grupo_item_id">Grupo do item:</label>
    <select name="grupo_item_id" class="form-control" id="grupo_item_id" maxlength="45">
      <option value="" label="Selecione o grupo do item..." selected></option>
      @foreach ($listaGrupoItem as $grupo_item)
      <option value="{{ $grupo_item->id }}" label="{{ $grupo_item->descricao }}">{{ $grupo_item->descricao }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="quantidade_minima">Quantidade mínima:</label>
    <input type="number" class="form-control" id="quantidade_minima" name="quantidade_minima"
        placeholder="Informe a quantidade mínima..." step="any">
  </div>
  <div class="form-group">
    <label for="quantidade_maxima">Quantidade máxima:</label>
    <input type="number" class="form-control" id="quantidade_maxima" name="quantidade_maxima"
        placeholder="Informe a quantidade máxima..." step="any">
  </div>
  <div class="form-group">
    <label for="medicamento_id">Medicamento:</label>
    <select name="medicamento_id" class="form-control" id="medicamento_id" maxlength="45">
      <option value="" label="Selecione o medicamento..." selected></option>
      @foreach ($listaMedicamento as $medicamento)
      <option value="{{ $medicamento->id }}" label="{{ $medicamento->nome }}">{{ $medicamento->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
      <label for="kit">Kit:</label>
      <input type="checkbox" name="kit" id="kit" data-toggle="toggle" data-on="Sim"
      data-off="Não">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-success">Gerar relatório</button>
  </div>
</form>
<script>
  let icon = document.getElementById("card-title-icon");
  let title = document.getElementById("card-title-title");
  icon.classList.add("bxs-spreadsheet");
  title.innerText = "Relatório de estoque";
</script>
@endsection
