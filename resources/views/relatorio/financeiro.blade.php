@extends('template')
@section('conteudo')
<form>
    <div class="form-group">
        <a type="button" href="/relatorio.relatorioFinanceiro" class="btn btn-warning">Gerar contrato</a>
    </div>
</form>
</div>
<script>
  let icon = document.getElementById('card-title-icon');
  let title = document.getElementById('card-title-title');
  icon.classList.add('bxs-spreadsheet');
  title.innerText = "Relatório do financeiro"
</script>
@endsection
