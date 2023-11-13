<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal AAPC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="/css/portal.css" rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
     <a href="/login" style="margin-right: 16px">
        <img width="200" src="/images/logo_aapc.png" alt="" />
     </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active" href="https://maps.app.goo.gl/fa3Z9JXUVZ5Kiyoz5" target="_blank">
            Localização</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contatos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div><i class='bx bxl-whatsapp' style='color:#00d15c'></i><span>WhatsApp: (75)99211-1055</span></div>
              <div><i class='bx bxs-phone'></i><span>Telefone: (75) 3623-6488</span></div>
              <div><i class='bx bx-envelope'></i><span>Email: aapc@gmail.com</span></div>
            </div>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <button class="btn btn-outline-success my-2 my-sm-0" type="button">Login</button>
        </div>
      </div>
    </nav>
    <div class="container-fluid"></div>
  </body>
  <script>
    $(document).ready(function(){
        var isTextSelecting = false;

        // Impede o clique nos itens do dropdown
        $('.dropdown-menu div').on('click', function(e){
        e.stopPropagation();
        });

        // Impede o fechamento do dropdown ao clicar fora dele
        $(document).on('mousedown', function(e){
        var dropdownMenu = $('.dropdown-menu');

        // Verifica se está selecionando texto dentro do dropdown
        isTextSelecting = dropdownMenu.has(e.target).length > 0;

        if (!isTextSelecting) {
            dropdownMenu.removeClass('show');
        }
        });

        // Adiciona evento ao término da seleção de texto para reabrir o dropdown
        $(document).on('mouseup', function(){
        if (isTextSelecting) {
            $('.dropdown-menu').addClass('show');
            isTextSelecting = false;
        }
        });
    });
  </script>

</html>
