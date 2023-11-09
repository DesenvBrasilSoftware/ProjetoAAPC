(function($) {
  "use strict";

  $(function() {
    for (var nk = window.location, o = $(".nano-content li a").filter(function() {
          return this.href == nk;
        })
        .addClass("active")
        .parent()
        .addClass("active");;) {
      if (!o.is("li")) break;
      o = o.parent()
        .addClass("d-block")
        .parent()
        .addClass("active");
    }
  });


  /*
  ------------------------------------------------
  Sidebar open close animated humberger icon
  ------------------------------------------------*/

  $(".hamburger").on('click', function() {
    $(this).toggleClass("is-active");
  });

  /* TO DO LIST
  --------------------*/
  $(".tdl-new").on('keypress', function(e) {
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) {
      var v = $(this).val();
      var s = v.replace(/ +?/g, '');
      if (s == "") {
        return false;
      } else {
        $(".tdl-content ul").append("<li><label><input type='checkbox'><i></i><span>" + v + "</span><a href='#' class='ti-close'></a></label></li>");
        $(this).val("");
      }
    }
  });

  $(".tdl-content a").on("click", function() {
    var _li = $(this).parent().parent("li");
    _li.addClass("remove").stop().delay(100).slideUp("fast", function() {
      _li.remove();
    });
    return false;
  });

  // for dynamically created a tags
  $(".tdl-content").on('click', "a", function() {
    var _li = $(this).parent().parent("li");
    _li.addClass("remove").stop().delay(100).slideUp("fast", function() {
      _li.remove();
    });
    return false;
  });
})(jQuery);

// Altera o texto do titulo do cadastro ou listagem com base no nome da rota

let icon = document.getElementById('card-title-icon');
let title = document.getElementById('card-title-title');
let route = window.location.pathname;
route = route.split(".").shift()

switch (route) {
    case '/acomodacao':
        icon.classList.add('bxs-bed');
        title.innerText = "Cadastro de acomodação"
        break;
    case '/refeicao':
        icon.classList.add('bxs-dish');
        title.innerText = "Cadastro de refeição"
        break;
    case '/bairro':
        icon.classList.add('bxs-map');
        title.innerText = "Cadastro de bairro"
        break;
    case '/cidade':
        icon.classList.add('bxs-map');
        title.innerText = "Cadastro de cidade"
        break;
    case '/entradaDoacao':
        icon.classList.add('bxs-donate-heart');
        title.innerText = "Cadastro de entrada de doação"
        break;
    case '/saidaDoacao':
        icon.classList.add('bxs-donate-heart');
        title.innerText = "Cadastro de saída de doação"
        break;
    case '/contasAPagar':
        icon.classList.add('bxs-dollar');
        title.innerText = "Cadastro de contas a pagar"
        break;
    case '/contasAReceber':
        icon.classList.add('bxs-dollar');
        title.innerText = "Cadastro de contas a receber"
        break;
    case '/classeTerapeutica':
        icon.classList.add('bxs-vial');
        title.innerText = "Cadastro de classe terapêuica"
        break;
    case '/enfermidade':
        icon.classList.add('bxs-pulse');
        title.innerText = "Cadastro de enfermidade"
        break;
    case '/item':
        icon.classList.add('bxs-data');
        title.innerText = "Cadastro de item"
        break;
    case '/grupoItem':
        icon.classList.add('bxs-data');
        title.innerText = "Cadastro de grupo de item"
        break;
    case '/medicamento':
        icon.classList.add('bxs-first-aid');
        title.innerText = "Cadastro de medicamento"
        break;
    case '/paciente':
        icon.classList.add('bxs-face');
        title.innerText = "Cadastro de paciente"
        break;
    case '/usuario':
        icon.classList.add('bxs-group');
        title.innerText = "Cadastro de usuário"
        break;
    default:
}
