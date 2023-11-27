@extends('template')
@section('conteudo')
    <form class="needs-validation" novalidate id="form" action="/bairro.store" method="post">
        @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" id="nome" maxlength="120"
                    value="{{ old('nome') }}" autofocus placeholder="Informe o nome do bairro">
            </div>
            <div class="form-group">
                <label for="nome">Cidade:</label>
                <select name="cidade_id" class="form-control" id="cidade_id">
                    @foreach($cidades as $cidade)
                        <option value="{{ $cidade->id }}" {{ $cidade->id == 1 ? 'selected' : '' }}>
                            {{ $cidade->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            <a type="button" href="/bairro.index" class="btn btn-warning">Fechar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>

    </form>
@endsection
