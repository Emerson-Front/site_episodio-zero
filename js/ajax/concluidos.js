let editar = '[id^="editar_"]';
$(editar).click(function () {
    let nome = $.escapeSelector($(this).data('nome'));
    let editar = $(`div[data-nome=` + nome);

    if (editar.css('display') === 'none') {
        editar.css('display', 'flex');
        $(this).css('color', '#34b939');

    } else {
        editar.css('display', 'none');
        $(this).css('color', '');
    }
});



$('[name="salvar"]').click(function () {
    let id_anime = $(this).data('id');
    let form = $(this).closest('form'); // Encontra o formulário mais próximo
    let input = form.find('#input'); // Encontra o input dentro desse formulário
    let textarea = form.find('#notas');
    let nome = input.val();
    let notas = textarea.val();
    let tipo = 'salvar';

    ajax_editar(id_anime, nome, notas, tipo);
    location.reload();

});


$('[name="deletar"]').click(function () {
    let id_anime = $(this).data('id');
    let tipo = 'deletar';
    ajax_editar(id_anime, null, null, tipo);
    location.reload();
});




function ajax_editar(id_anime, nome, notas, tipo) {
    return $.ajax({
        url: '',
        method: 'POST',
        data: {
            id_anime: id_anime,
            nome: nome,
            notas: notas,
            tipo: tipo
        }
    });
}



$('.star1').click(function () {
    let id_anime = $(this).data('id');
    ajax_star(1, id_anime);
    location.reload();

});

$('.star2').click(function () {
    let id_anime = $(this).data('id');
    ajax_star(2, id_anime);
    location.reload();
});
$('.star3').click(function () {
    let id_anime = $(this).data('id');
    ajax_star(3, id_anime);
    location.reload();
});
$('.star4').click(function () {
    let id_anime = $(this).data('id');
    ajax_star(4, id_anime);
    location.reload();
});
$('.star5').click(function () {
    let id_anime = $(this).data('id');
    ajax_star(5, id_anime);
    location.reload();
});


function ajax_star(star, id_anime) {
    $.ajax({
        url: '',
        method: 'POST',
        data: {
            star: star,
            id_anime: id_anime
        }
    });
}

