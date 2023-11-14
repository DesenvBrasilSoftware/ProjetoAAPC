$(document).ready(function () {
    var isTextSelecting = false;

    // Impede o clique nos itens do dropdown
    $(".dropdown-menu div").on("click", function (e) {
        e.stopPropagation();
    });

    // Impede o fechamento do dropdown ao clicar fora dele
    $(document).on("mousedown", function (e) {
        var dropdownMenu = $(".dropdown-menu");
        // Verifica se está selecionando texto dentro do dropdown
        isTextSelecting = dropdownMenu.has(e.target).length > 0;
        if (!isTextSelecting) {
            dropdownMenu.removeClass("show");
        }
    });

    // Adiciona evento ao término da seleção de texto para reabrir o dropdown
    $(document).on("mouseup", function () {
        if (isTextSelecting) {
            $(".dropdown-menu").addClass("show");
            isTextSelecting = false;
        }
    });
});
