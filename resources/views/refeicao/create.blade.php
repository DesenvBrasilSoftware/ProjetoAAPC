@extends('template')
@section('conteudo')
<form id="form" action="/refeicao.store" method="post">
  @csrf
  <div class="form-group">
    <label for="data">Data:</label>
    <input type="date" class="form-control" id="data" name="data" placeholder="Insira a data da refeição">
  </div>
  <div class="form-group">
    <label for="tipoRefeicao">Tipo de Refeição</label>
        <select name="tipoRefeicao" class="form-control" id="tipoRefeicao">
            <option value="1">Café da manhã</option>
            <option value="2">Lanche da manhã</option>
            <option value="3">Almoço</option>
            <option value="4">Lanche da tarde</option>
            <option value="5">Jantar</option>
            <option value="6">Lanche da noite</option>
            <option value="7">Ceia</option>
        </select>
  </div>
  <div class="form-group">
      <label for="paciente_id">Paciente:</label>
      <select name="paciente_id" class="form-control" id="paciente_id" maxlength="45">
        <option value="" label="Selecione o paciente..." selected></option>
        @foreach ($listaPaciente as $paciente)
        <option value="{{ $paciente->id }}" label="{{ $paciente->nome }}">{{ $paciente->nome }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="servida">Servida:</label>
        <input type="checkbox" name="servida" id="servida"
        data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('servida') ? 'checked' : '' }}>
    </div>
  <div class="form-group">
      <a type="button" href="/refeicao.index" class="btn btn-warning">Fechar</a>
      <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>
@endsection
