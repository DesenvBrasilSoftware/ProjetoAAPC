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
    <label for="visualiza_acomodacao">Visualiza acomodacao:</label>
    <input type="checkbox" name="visualiza_acomodacao" id="visualiza_acomodacao"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_acomodacao') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_localidade">Visualiza localidade:</label>
    <input type="checkbox" name="visualiza_localidade" id="visualiza_localidade"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_localidade') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_pessoa">Visualiza pessoa:</label>
    <input type="checkbox" name="visualiza_pessoa" id="visualiza_pessoa"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_pessoa') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_paciente">Visualiza paciente:</label>
    <input type="checkbox" name="visualiza_paciente" id="visualiza_paciente"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_paciente') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_refeicao">Visualiza refeição:</label>
    <input type="checkbox" name="visualiza_refeicao" id="visualiza_refeicao"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_refeicao') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_doacoes">Visualiza doações:</label>
    <input type="checkbox" name="visualiza_doacoes" id="visualiza_doacoes"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_doacoes') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_financeiro">Visualiza financeiro:</label>
    <input type="checkbox" name="visualiza_financeiro" id="visualiza_financeiro"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_financeiro') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_classe_terapeutica">Visualiza classe terapêutica:</label>
    <input type="checkbox" name="visualiza_classe_terapeutica" id="visualiza_classe_terapeutica"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_classe_terapeutica') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_enfermidade">Visualiza enfermidade:</label>
    <input type="checkbox" name="visualiza_enfermidade" id="visualiza_enfermidade"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_enfermidade') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_estoque">Visualiza estoque:</label>
    <input type="checkbox" name="visualiza_estoque" id="visualiza_estoque"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_estoque') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_medicamentos">Visualiza medicamento:</label>
    <input type="checkbox" name="visualiza_medicamentos" id="visualiza_medicamentos"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_medicamentos') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_usuarios">Visualiza usuários:</label>
    <input type="checkbox" name="visualiza_usuarios" id="visualiza_usuarios"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_usuarios') ? 'checked' : '' }}>
  </div>
  <div class="form-group">
    <label for="visualiza_relatorios">Visualiza relatórios:</label>
    <input type="checkbox" name="visualiza_relatorios" id="visualiza_relatorios"
    data-toggle="toggle" data-on="Sim" data-off="Não" {{ old('visualiza_relatorios') ? 'checked' : '' }}>
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
