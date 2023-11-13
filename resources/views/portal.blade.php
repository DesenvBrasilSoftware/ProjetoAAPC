<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portal AAPC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/js/portal.js"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <link href="/css/portal.css" rel="stylesheet" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a href="/login" style="margin-right: 16px;">
        <img width="200" src="/images/logo_aapc.png" alt="" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link active" href="https://maps.app.goo.gl/fa3Z9JXUVZ5Kiyoz5" target="_blank"> Localização</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Contatos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div><i class="bx bxl-whatsapp" style="color: #00d15c;"></i><span>WhatsApp: (75)99211-1055</span></div>
              <div><i class="bx bxs-phone"></i><span>Telefone: (75) 3623-6488</span></div>
              <div><i class="bx bx-envelope"></i><span>Email: aapc@gmail.com</span></div>
            </div>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <button class="btn btn-success my-2 my-sm-0" type="button" onclick="window.location.href='/login'">Login</button>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row" style="margin: 2rem 0">
        <div class="col d-flex justify-content-center mb-4">
          <img width="360px" src="/images/card-doacao.png" alt="" />
        </div>
        <div class="col mx-auto">
          <div class="qrcode-card">
            <h1 class="text-center" style="margin-bottom: 0px;">Doe com <i style="color: #30b6a8;" class="fa-brands fa-pix"></i> PIX</h1>
            <img width="90%" src="/images/qrcode-pix.png" alt="" />
            <span class="text-center">Chave PIX: 05.363.115/0001-64</span>
            <span class="text-center">Nome: AAPC</span>
          </div>
        </div>
      </div>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1 mr-2">
        <img style="filter: grayscale(100%);" width="32px"src="/favicon.png" alt="">
      </a>
      <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li style="font-size: 2rem" class="ms-3"><a class="text-muted" href="#">Instagram <i class='bx bxl-instagram-alt' ></i></a></li>
    </ul>
  </footer>
  </body>
</html>
