// Quando o checkbox é alterado
$('input[type="checkbox"]').change(function () {
    let id_anime = $(this).attr('id'); // Captura o ID do checkbox
    // Verifica se o checkbox foi marcado
    if ($(this).is(':checked')) {
        // Evento de clique para deletar os itens selecionados
        $('.btn_deletar').click(function () {
            // Captura todos os checkboxes marcados
            let checkboxesMarcados = $('input[type="checkbox"]:checked');
            let totalMarcados = checkboxesMarcados.length;
            let deletados = 0;
            // Para cada checkbox marcado, faz o AJAX e conta os deletados
            checkboxesMarcados.each(function () {
                let id_anime = $(this).attr('id');
                ajax(id_anime).done(function () {
                    deletados++;

                    if (deletados === totalMarcados) {
                        location.reload();
                    }
                });
            });
        });
    }

});


// Função AJAX
function ajax(id_anime) {
    return $.ajax({
        url: '', // Coloque sua URL aqui
        method: 'POST',
        data: {
            id_anime: id_anime
        }
    });
}

