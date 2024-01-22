<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>AAPC</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff" />
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff" />
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff" />
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff" />
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff" />
    <!-- Styles -->
    <link href="/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet" />
    <link href="/css/lib/data-table/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <link href="/css/lib/data-table/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="/css/lib/chartist/chartist.min.css" rel="stylesheet" />
    <link href="/css/lib/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/lib/themify-icons.css" rel="stylesheet" />
    <link href="/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="/css/lib/menubar/sidebar.css" rel="stylesheet" />
    <link href="/css/lib/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/lib/helper.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  </head>
  <body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
      <div class="nano">
        <div class="nano-content">
          <ul>
            <li class="logo">
              <a href="/">
                <img src="/favicon.png" alt="">
                <span>AAPC</span>
              </a>
            </li>
            @if(Auth::user()->visualiza_paciente)
            <li>
                <a href="paciente.index">
                    <i class='bx bx-face'></i>Paciente
                </a>
            </li>
            @endif
            @if(Auth::user()->visualiza_acomodacao)
            <li>
              <a href="acomodacao.index">
                <i class='bx bxs-bed'></i>Acomodação
              </a>
            </li>
            @endif
            @if(Auth::user()->visualiza_refeicao)
            <li>
              <a href="refeicao.index">
                <i class='bx bxs-dish'></i>Refeição
              </a>
            </li>
            @endif
            @if(Auth::user()->visualiza_pessoa)
            <li>
              <a href="pessoa.index">
                <i class='bx bxs-user'></i>Pessoa
              </a>
            </li>
            @endif
            @if(Auth::user()->visualiza_doacoes)
            <li>
              <a class="sidebar-sub-toggle">
                <i class='bx bxs-donate-heart'></i>Doações
                <span class="sidebar-collapse-icon ti-angle-down"></span>
              </a>
              <ul>
                <li><a href="entradaDoacao.index">Entrada por doação</a></li>
                <li><a href="saidaDoacao.index">Saída por doação</a></li>
              </ul>
            </li>
            @endif
            @if(Auth::user()->visualiza_estoque)
            <li>
              <a class="sidebar-sub-toggle">
                <i class='bx bx-data'></i>Estoque
                <span class="sidebar-collapse-icon ti-angle-down"></span>
              </a>
              <ul>
                <li><a href="item.index">Item</a></li>
                <li><a href="grupoItem.index">Grupo Item</a></li>
              </ul>
            </li>
            @endif
            @if(Auth::user()->visualiza_medicamentos)
            <li>
              <a href="medicamento.index">
                <i class='bx bxs-first-aid'></i></i>Medicamentos
              </a>
            </li>
            @endif
            @if(Auth::user()->visualiza_classe_terapeutica)
            <li>
              <a href="classeTerapeutica.index">
                <i class='bx bxs-vial' ></i>Classe terapêutica
              </a>
            </li>
            @endif
            @if(Auth::user()->visualiza_enfermidade)
            <li>
              <a href="enfermidade.index">
                <i class='bx bx-pulse' ></i>Enfermidade
              </a>
            </li>
            @endif
            @if(Auth::user()->visualiza_localidade)
            <li>
              <a class="sidebar-sub-toggle">
                <i class='bx bxs-map'></i>Localidade
                <span class="sidebar-collapse-icon ti-angle-down"></span>
              </a>
              <ul>
                <li><a href="cidade.index">Cidade</a></li>
              </ul>
            </li>
            @endif
            @if(Auth::user()->visualiza_financeiro)
            <li>
              <a class="sidebar-sub-toggle">
                <i class='bx bx-dollar'></i>Financeiro
                <span class="sidebar-collapse-icon ti-angle-down"></span>
              </a>
              <ul>
                <li><a href="contasAPagar.index">Contas a Pagar</a></li>
                <li><a href="contasAReceber.index">Contas a Receber</a></li>
              </ul>
            </li>
            @endif
            @if(Auth::user()->visualiza_usuarios)
            <li>
                <a href="usuario.index">
                    <i class='bx bxs-group'></i>Usuários
                </a>
            </li>
            @endif
            @if(Auth::user()->visualiza_relatorios)
            <li>
              <a class="sidebar-sub-toggle">
                <i class='bx bxs-spreadsheet'></i>Relatórios
                <span class="sidebar-collapse-icon ti-angle-down"></span>
              </a>
              <ul>
                <li><a href="/relatorio.financeiro">Financeiro</a></li>
                <li><a href="/relatorio.estoque">Estoque</a></li>
                <li><a href="/relatorio.pacientes">Pacientes</a></li>
              </ul>
            </li>
            @endif
            <hr style="border-top: 1px solid rgba(255,255,255,0.6);">
            <li>
              <a onclick="return confirm('Tem certeza de que deseja sair?');" href="{{ route('logout') }}">
                <i class='bx bx-log-out'></i>Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /# sidebar -->
    <div class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="float-left">
              <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
              </div>
            </div>
            <div class="float-right">
                <div class="profile">
                    <span class="user-avatar">{{ Auth::user()->nome }}</span>
                    <i class='bx bxs-user-circle'></i>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-wrap">
      <div class="main">
        <div class="container-fluid">
          <div class="card">
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
              {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <div class="card-title">
              <div style="display: flex; align-items: center">
                <i class="bx" id="card-title-icon"></i>
                <h4 id="card-title-title"></h4>
              </div>
              <div>

              </div>
            </div>
            @yield('conteudo')
            <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
                  'use strict';
                  window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                      form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                          event.preventDefault();
                          event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                      }, false);
                  });
                  }, false);
              })();
            </script>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- jquery vendor -->
    <script src="/js/lib/jquery.min.js"></script>
    <script src="/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="/js/lib/menubar/sidebar.js"></script>
    <script src="/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="/js/lib/bootstrap.min.js"></script>
    <script src="/js/scripts.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
      ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- bootstrap -->
    <script src="/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="/js/lib/calendar-2/pignose.init.js"></script>
    {{--
    <script src="/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="/js/lib/weather/weather-init.js"></script>
    <script src="/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="/js/lib/chartist/chartist.min.js"></script>
    <script src="/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="/js/lib/owl-carousel/owl.carousel-init.js"></script>
    --}}
    <!-- scripit init-->
    {{--
    <script src="/js/dashboard2.js"></script>
    --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
      const customLanguage = {
        processing: "Processando...",
        search: "Pesquisar:",
        lengthMenu: "Mostrar _MENU_ registros",
        info: "Exibindo registros de _START_ a _END_ de um total de _TOTAL_ registros",
        infoEmpty: "Exibindo registros de 0 a 0 de um total de 0 registros",
        infoFiltered: "(filtrado de um total de _MAX_ registros)",
        infoPostFix: "",
        loadingRecords: "Carregando...",
        zeroRecords: "Nenhum registro encontrado",
        emptyTable: "Nenhum dado disponível na tabela",
        paginate: {
          first: "Primeiro",
          previous: "Anterior",
          next: "Próximo",
          last: "Último",
        },
        aria: {
          sortAscending: ": ativar para classificar a coluna em ordem crescente",
          sortDescending: ": ativar para classificar a coluna em ordem decrescente",
        },
        decimal: ",",
        thousands: ".",
      };
    $(document).ready(function() {
      $('#dataTable').DataTable({
        "order": [0, 'desc'],
        "columnDefs": [{
            "orderable": false,
            "targets": [-2, -1]
          }
        ],
        "language": customLanguage // Aplicar as configurações de linguagem personalizadas
      });
    });
    </script>
  </body>
</html>
