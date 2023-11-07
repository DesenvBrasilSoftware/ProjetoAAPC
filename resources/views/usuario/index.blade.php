@extends('template')
@section('conteudo')

<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center p-2 rounded mb-5" style="background-color: #343957fe;">
                    <h4 class="mb-0 ml-2 text-white" style="color: #bbb !important;">Listagem de Usuários</h4>
                </div>

                <a type="button" href="/usuario.create" class="btn btn-primary">Incluir</a>

                <table id="dataTable" class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Alterar</th>
                            <th>Excluir</th>
                            <th>Nome</th>
                            <th>Login</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lista as $obj)

                            <input type="hidden" id="id_{{$obj->id}}" value="{{$obj->id}}">

                            <tr>
                                <td width="1%">
                                    <a href="/usuario.edit.{{$obj->id}}"><i class="fa fa-edit"></i></a>
                                </td>

                                <td width="1%">
                                    <a href="/usuario.delete.{{$obj->id}}" onclick="return confirm('Tem certeza de que deseja excluir este item?');"><i class="fa fa-trash"></i></a>
                                </td>

                                <td>
                                    {{$obj->nome}}
                                </td>

                                <td>
                                    {{$obj->login}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection