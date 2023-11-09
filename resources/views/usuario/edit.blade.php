@extends('template')
@section('conteudo')
<form id="form" action="/usuario.store" method="post">
  @csrf
  <input type="hidden" id="id" name="id" value="{{ $obj->id }}">
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
    <span id="login-error" style="color: red;"></span>
  </div>
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
  <div class="form-group">
    <a type="button" href="/usuario.index" class="btn btn-warning">Cancelar</a>
    <button type="submit" class="btn btn-primary mr-3">Salvar</button>
  </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $('#login').on('input', function() {
          const login = $(this).val();
          if (login) {
              $.ajax({
                  url: '/verificaLogin',
                  method: 'GET',
                  data: { login: login, id: $('#id').val() },
                  success: function(data) {
                      if (data.exists) {
                          $('#login-error').text('Login já está em uso.');
                      } else {
                          $('#login-error').text('');
                      }
                  },
              });
          } else {
              $('#login-error').text('');
          }
      });
  });
</script>
@endsection
