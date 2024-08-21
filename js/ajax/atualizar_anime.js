// BOTÕES DE INCREMENTO E DECREMENTO
$(document).ready(function () {
    // Aqui, $('[id^="decremento_temp"]') seleciona todos os elementos cujo ID começa com decremento_temp.
    let decremento_temp = '[id^="decremento_temp"]';
    let incremento_temp = '[id^="incremento_temp"]';
    let decremento_ep = '[id^="decremento_ep"]';
    let incremento_ep = '[id^="incremento_ep"]';

    $(decremento_temp).click(function () {
        // Encontra o input associado ao botão clicado
        let inputId = $(this).attr('id').replace('decremento_temp', 'numberInput_temp');
        let input = $('#' + inputId);
        let valorAtual = parseInt(input.val());
        if (valorAtual > 0) {
            input.val(valorAtual - 1);
        }

        let id_anime = input.closest('.anime').attr('id');
        ajax(id_anime, valorAtual - 1, 'temporada');
    });

    $(incremento_temp).click(function () {
        let inputId = $(this).attr('id').replace('incremento_temp', 'numberInput_temp');
        let input = $('#' + inputId);
        let valorAtual = parseInt(input.val());
        input.val(valorAtual + 1);

        let id_anime = input.closest('.anime').attr('id');
        ajax(id_anime, valorAtual + 1, 'temporada');

    });

    $(decremento_ep).click(function () {
        let inputId = $(this).attr('id').replace('decremento_ep', 'numberInput_ep');
        let input = $('#' + inputId);
        let valorAtual = parseInt(input.val());
        if (valorAtual > 0) {
            input.val(valorAtual - 1);
        }

        let id_anime = input.closest('.anime').attr('id');
        ajax(id_anime, valorAtual - 1, 'episodio');
    });

    $(incremento_ep).click(function () {
        let inputId = $(this).attr('id').replace('incremento_ep', 'numberInput_ep');
        let input = $('#' + inputId);
        let valorAtual = parseInt(input.val());
        input.val(valorAtual + 1);

        let id_anime = input.closest('.anime').attr('id');
        ajax(id_anime, valorAtual + 1, 'episodio');
    });


    function ajax(id_anime, valor, tipo) {
        $.ajax({
            url: '',
            method: 'POST',
            data: {
                id_anime: id_anime,
                valor: valor,
                tipo: tipo
            }
        });
    }

});
