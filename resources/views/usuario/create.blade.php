@extends('template')
@section('conteudo')
<form id="form" action="/usuario.store" method="post">
  @csrf
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text"
      name="nome"
      class="form-control"
      id="nome"
      maxlength="45"
      value="{{old('nome')}}"
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
      value="{{old('login')}}"
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
      value="{{old('senha')}}"
      autofocus
      required
      >
  </div>
  <div class="form-group">
    <a type="button" href="/usuario.index" class="btn btn-warning">Cancelar</a>
    <button type="submit" class="btn btn-primary mr-3">Salvar</button>
  </div>
</form>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      $('#login').on('input', function() {
          const login = $(this).val();
          if (login) {
              $.ajax({
                  url: '/verificaLogin',
                  method: 'GET',
                  data: { login: login },
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
