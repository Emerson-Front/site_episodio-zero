// Regras para o nome de usuario
/**
 * Minímo 5 caractéres
 * Maxímo 30 caractéres
 * Caracteres especiais permitidos _ (underline) e - (hífen)
 * Não pode ter espaço
 * Não pode ter mais de 1 usuário com o mesmo nome
 * Primeiro caractar maiusculo
 */
const btnRegistrar = document.getElementById('btn_registrar');


document.getElementById('nome_registro').addEventListener('input', function () {

    let escrita = this.value;
    // Forçar a primeira letra maiúscula
    if (escrita.length > 0) {
        escrita = escrita.charAt(0).toUpperCase() + escrita.slice(1);
        this.value = escrita;
    }

    const mensagem = document.getElementById('mensagem_nome');
    const regex = /^[A-Za-z0-9][A-Za-z0-9_-]{4,29}$/;

    const focus = document.getElementById('nome_registro');

    if (escrita.length < 5) {
        mensagem.textContent = "Minímo 5 caracteres";
        mensagem.className = 'red';
        focus.className = '';
        btnRegistrar.disabled = true;

    } else {
        if (!regex.test(escrita)) {
            mensagem.textContent = 'Nome não disponível';
            mensagem.className = 'red';
            focus.className = '';
            btnRegistrar.disabled = true;
        } else {
            mensagem.textContent = "Válido";
            mensagem.className = 'mensagem';
            focus.className = 'focus-green';
            btnRegistrar.disabled = false;
        }
    }

});


// Regras para a senha
/**
 * Minímo 6 caractéres
 * Maxímo 30 caractéres
 * Todos caracteres permitidos
 * Não pode ter espaço
 */



document.getElementById('senha_registro').addEventListener('input', function () {

    let escrita = this.value;
    const mensagem = document.getElementById('mensagem_senha');

    const regex = /^[^\s]{5,29}$/;

    const focus = document.getElementById('senha_registro');

    if (escrita.length < 6) {
        mensagem.textContent = "Minímo 6 caracteres";
        mensagem.className = 'red';
        focus.className = '';
        btnRegistrar.disabled = true;

    } else {
        if (!regex.test(escrita)) {
            mensagem.textContent = 'Senha não pode ter espaço!';
            mensagem.className = 'red';
            focus.className = '';
            btnRegistrar.disabled = true;


        } else {
            mensagem.textContent = "Válido";
            mensagem.className = 'mensagem';
            focus.className = 'focus-green';
            btnRegistrar.disabled = false;
        }
    }

});

/* Confirmação de senha */

document.getElementById('senha_confirm').addEventListener('input', function () {
    const escrita = this.value;
    const senha = document.getElementById('senha_registro').value;
    const mensagem = document.getElementById('mensagem_senha_confirm');

    const focus = document.getElementById('senha_confirm');

    if (escrita == senha) {
        mensagem.textContent = "Válido";
        mensagem.className = 'mensagem';
        focus.className = 'focus-green';
        btnRegistrar.disabled = false;
    } else {
        mensagem.textContent = "Senhas não conferem";
        mensagem.className = 'red';
        focus.className = '';
        btnRegistrar.disabled = true;
    }

});