$('#validar').click(function () {

    $('#validar').css('display', 'none');
    $('#codigo').css('display', 'block');
    $("#enviar").css('display', 'block')
    $('#label').text('Código enviado no e-mail!').css('color', 'rgb(0, 255, 0)');


    $.ajax({
        url: '',
        method: 'GET',
        data: {
            email: 'email'
        }
    });

});
