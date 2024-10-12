<div class="fundo_login"></div>

<form action="" method="post" class="login registro">
    <h1>Registrar</h1>

    <label>Crie um nome de Usuário:</label>
    <input type="text" placeholder="Digite o nome de usuário" id="nome_registro" name="nome_registro" required>
    <span id="mensagem_nome" class="mensagem"></span>

    <label>E-mail:</label>
    <input type="email" placeholder="Digite seu e-mail" id="email_registro" name="email" required>
    <span id="mensagem_nome" class="mensagem"></span>

    <label>Senha:</label>
    <input type="password" placeholder="Digite sua senha" name="senha_registro" id="senha_registro" required>
    <span id="mensagem_senha" class="mensagem"></span>

    <label>Repita sua senha:</label>
    <input type="password" placeholder="Digite sua senha" name="senha_confirm" id="senha_confirm" required>
    <span id="mensagem_senha_confirm" class="mensagem"></span>

    <button type="submit" id="btn_registrar" name="btn_registrar">Criar</button>

    <p>Já tem uma conta?</p>
    <a href="acesso">Faça seu login</a>
</form>