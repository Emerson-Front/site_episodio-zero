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
                ajax(id_anime, 'deletar').done(function () {
                    deletados++;

                    if (deletados === totalMarcados) {
                        location.reload();
                    }
                });
            });
        });

        $('.btn_concluido').click(function () {
            let checkboxesMarcados = $('input[type="checkbox"]:checked');
            let totalMarcados = checkboxesMarcados.length;
            let concluidos = 0;
            checkboxesMarcados.each(function () {
                let id_anime = $(this).attr('id');
                ajax(id_anime, 'concluir').done(function () {
                    concluidos++;
                    if (concluidos === totalMarcados) {
                        location.reload();
                    }
                });
            });
        });
    }
});


// Função AJAX
function ajax(id_anime, tipo) {
    return $.ajax({
        url: '',
        method: 'POST',
        data: {
            id_anime: id_anime,
            tipo: tipo
        }
    });
}

