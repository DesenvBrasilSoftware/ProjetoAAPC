@extends('template')
@section('conteudo')
  <form class="needs-validation" novalidate id="form" action="/item.store" method="post">
    @csrf
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <input required type="text" name="descricao" class="form-control" id="descricao" maxlength="60" value="{{ old('descricao') }}" autofocus placeholder="Digite a descrição do item" />
    </div>
    <div class="form-group" id="quantidade_id">
      <label for="quantidade">Quantidade:</label>
      <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade') }}"
          placeholder="Informe a quantidade..." step="any">
    </div>
    <div class="form-group">
      <label for="grupo_item_id">Grupo do item:</label>
      <select required name="grupo_item_id" class="form-control" id="grupo_item_id" maxlength="45">
        <option value="" label="Selecione um grupo de item..." selected></option>
        @foreach ($listaGrupoItem as $grupoItem)
        <option value="{{ $grupoItem->id }}" label="{{ $grupoItem->descricao }}">{{ $grupoItem->descricao }}</option>
        @endforeach
      </select>
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
        data-off="Não" {{ old('kit') ? 'checked' : '' }}>
    </div>
    <div class="form-group">
      <a href="/item.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </form>
  <script>
    $(document).ready(function(){
        $('#kit').change(function(){
            if($(this).prop('checked')){
                $('#quantidade_id').hide();
            } else {
                $('#quantidade_id').show();
            }
        });
    });
</script>
@endsection
