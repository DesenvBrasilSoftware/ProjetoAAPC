<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>AAPC</title>
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
  </head>

  <body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
      <div class="nano">
        <div class="nano-content">
          <ul>
            <div class="logo">
              <a href="/">
                <span>AAPC</span>
              </a>
            </div>

            <li>
              <a href="acomodacao.index"><i class="ti-clipboard"></i> Acomodação </a>
            </li>

            <li class="label"></li>
            <li>
              <a class="sidebar-sub-toggle"><i class="ti-location-pin"></i>Localidade<span class="sidebar-collapse-icon ti-angle-down"></span></a>
              <ul>
                <li><a href="bairro.index">Bairro</a></li>
                <li><a href="cidade.index">Cidade</a></li>
              </ul>
            </li>

            <li>
              <a href="classeTerapeutica.index"><i class="ti-paint-bucket"></i>Classe terapêutica</a>
            </li>

            <li>
              <a href="enfermidade.index"><i class="ti-pulse"></i>Enfermidade</a>
            </li>

            <li class="label"></li>
            <li>
              <a class="sidebar-sub-toggle"><i class="ti-server"></i>Estoque<span class="sidebar-collapse-icon ti-angle-down"></span></a>
              <ul>
                  <li><a href="item.index">Item</a></li>
                <li><a href="grupoItem.index">Grupo Item</a></li>
              </ul>
            </li>

            <li>
              <a href="medicamento.index"><i class="ti-support"></i>Medicamentos</a>
            </li>

                    <li><a href="paciente.index"><i class="ti-user"></i>Paciente</a></li>

                    <li><a href="{{ route('logout') }}"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>

            <li>
              <a href="{{ route('logout') }}"><i class="ti-close"></i> Logout</a>
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
              <div class="dropdown dib">
                <div class="header-icon" data-toggle="dropdown">
                  <i class="ti-bell"></i>
                  <div class="drop-down dropdown-menu dropdown-menu-right">
                    <div class="dropdown-content-heading">
                      <span class="text-left">Recent Notifications</span>
                    </div>
                    <div class="dropdown-content-body">
                      <ul>
                        <li>
                          <a href="#">
                            <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                            <div class="notification-content">
                              <small class="notification-timestamp pull-right">02:34 PM</small>
                              <div class="notification-heading">Mr. John</div>
                              <div class="notification-text">5 members joined today</div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                            <div class="notification-content">
                              <small class="notification-timestamp pull-right">02:34 PM</small>
                              <div class="notification-heading">Mariam</div>
                              <div class="notification-text">likes a photo of you</div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                            <div class="notification-content">
                              <small class="notification-timestamp pull-right">02:34 PM</small>
                              <div class="notification-heading">Tasnim</div>
                              <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                            <div class="notification-content">
                              <small class="notification-timestamp pull-right">02:34 PM</small>
                              <div class="notification-heading">Mr. John</div>
                              <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                            </div>
                          </a>
                        </li>
                        <li class="text-center">
                          <a href="#" class="more-link">See All</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="dropdown dib">
                <div class="header-icon" data-toggle="dropdown">
                  <i class="ti-email"></i>
                  <div class="drop-down dropdown-menu dropdown-menu-right">
                    <div class="dropdown-content-heading">
                      <span class="text-left">2 New Messages</span>
                      <a href="email.html">
                        <i class="ti-pencil-alt pull-right"></i>
                      </a>
                    </div>
                    <div class="dropdown-content-body">
                      <ul>
                        <li class="notification-unread">
                          <a href="#">
                            <img class="pull-left m-r-10 avatar-img" src="images/avatar/1.jpg" alt="" />
                            <div class="notification-content">
                              <small class="notification-timestamp pull-right">02:34 PM</small>
                              <div class="notification-heading">Michael Qin</div>
                              <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                            </div>
                          </a>
                        </li>
                        <li class="notification-unread">
                          <a href="#">
                            <img class="pull-left m-r-10 avatar-img" src="images/avatar/2.jpg" alt="" />
                            <div class="notification-content">
                              <small class="notification-timestamp pull-right">02:34 PM</small>
                              <div class="notification-heading">Mr. John</div>
                              <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                            <div class="notification-content">
                              <small class="notification-timestamp pull-right">02:34 PM</small>
                              <div class="notification-heading">Michael Qin</div>
                              <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <img class="pull-left m-r-10 avatar-img" src="images/avatar/2.jpg" alt="" />
                            <div class="notification-content">
                              <small class="notification-timestamp pull-right">02:34 PM</small>
                              <div class="notification-heading">Mr. John</div>
                              <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                            </div>
                          </a>
                        </li>
                        <li class="text-center">
                          <a href="#" class="more-link">See All</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="dropdown dib">
                <div class="header-icon" data-toggle="dropdown">
                  <span class="user-avatar">
                    John
                    <i class="ti-angle-down f-s-10"></i>
                  </span>
                  <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                    <div class="dropdown-content-heading">
                      <span class="text-left">Upgrade Now</span>
                      <p class="trial-day">30 Days Trail</p>
                    </div>
                    <div class="dropdown-content-body">
                      <ul>
                        <li>
                          <a href="#">
                            <i class="ti-user"></i>
                            <span>Profile</span>
                          </a>
                        </li>

                        <li>
                          <a href="#">
                            <i class="ti-email"></i>
                            <span>Inbox</span>
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <i class="ti-settings"></i>
                            <span>Setting</span>
                          </a>
                        </li>

                        <li>
                          <a href="#">
                            <i class="ti-lock"></i>
                            <span>Lock Screen</span>
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('logout') }}">
                            <i class="ti-power-off"></i>
                            <span>Logout</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
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

    <!-- jquery vendor -->
    <script src="/js/lib/jquery.min.js"></script>
    <script src="/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="/js/lib/menubar/sidebar.js"></script>
    <script src="/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="/js/lib/bootstrap.min.js"></script>
    <script src="/js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
  </body>
</html>
