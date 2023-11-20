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
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
      <a href="/" style="margin-right: 16px;">
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
      <div id="carouselExampleControls" class="carousel slide" style="margin: 1.5rem 0;" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-auto m-auto" src="/images/slides/slide1.jpg" alt="First slide" />
          </div>
          <div class="carousel-item">
            <img class="d-block w-auto m-auto" src="/images/slides/slide2.jpg" alt="Second slide" />
          </div>
          <div class="carousel-item">
            <img class="d-block w-auto m-auto" src="/images/slides/slide3.jpg" alt="Third slide" />
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="row" style="margin: 2rem 0;">
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
    <footer class="text-center text-lg-start bg-light text-muted">
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
          <span>Nossas redes sociais:</span>
        </div>
        <div>
          <a href="https://www.instagram.com/aapcoficial/" target="_blank" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </section>
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold mb-4">
                Quem somos?
              </h6>
              <p>
                Uma instituição sem fins lucrativos que tem como intenção acolher pacientes e seus familiares, contribuindo assim na luta contra o câncer.
              </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold">
                Apoio
              </h6>
              <p>
                <img style="max-width: 120px;" src="/images/icon-brasil.png" alt="" />
              </p>
              <p>
                <img style="max-width: 120px;" src="/images/icon-hostoo.png" alt="" />
              </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4"></div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
              <p><i class="fas fa-home me-3"></i> R. Thereza Cunha Santana, 174 - São JOÃO, Feira de Santana - BA, 44051-738</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                aapc@gmail.com
              </p>
              <p><i class="fas fa-phone me-3"></i>(75) 3623-6488</p>
            </div>
          </div>
        </div>
      </section>
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023 AAPC.
        <span class="text-reset fw-bold">Todos os Direitos Reservados.</span>
      </div>
    </footer>
  </body>
</html>
