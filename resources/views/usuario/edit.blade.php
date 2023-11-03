@extends('template')
@section('conteudo')

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center p-2 rounded mb-5" style="background-color: #343957fe;">
                    <h4 class="mb-0 ml-2 text-white" style="color: #bbb !important;">Alteração de Usuário</h4>
                </div>

                <form id="form" action="/usuario.store" method="post">
                    @csrf

                    <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
                    
                    <div class="row">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text"
                                    name="nome"
                                    class="form-control"
                                    id="nome"
                                    maxlength="45"
                                    value="{{$obj->nome}}"
                                    autofocus
                                    required
                                    >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text"
                                    name="login"
                                    class="form-control"
                                    id="login"
                                    maxlength="45"
                                    value="{{$obj->login}}"
                                    autofocus
                                    required
                                    >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password"
                                    name="senha"
                                    class="form-control"
                                    id="senha"
                                    value="{{$obj->senha}}"
                                    autofocus
                                    required
                                    >
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-2">
                        <button type="submit" class="btn btn-primary mr-3">Salvar</button>

                        <a type="button" href="/usuario.index" class="btn btn-warning">Cancelar</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
