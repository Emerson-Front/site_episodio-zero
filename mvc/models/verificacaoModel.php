<?php

namespace mvc\models;

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


\Config::SMTP_email();


class VerificacaoModel
{


    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->configurarSMTP();
    }

    private function configurarSMTP()
    {
        $this->mail->isSMTP();
        $this->mail->Host = self::HOST;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = self::EMAIL;
        $this->mail->Password = self::SENHA;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = self::PORTA;
        $this->mail->CharSet = 'UTF-8';
    }

    private function Destinatario($emailDestinatario)
    {
        $this->mail->setFrom(self::EMAIL);
        $this->mail->addAddress($emailDestinatario);
    }


    private function CorpoEmail($codigo)
    {
        ob_start();
        ?>
        <div
            style='font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 10px;'>
            <h2 style='color: #2c3e50; text-align: center;'>Verificação de E-mail</h2>
            <p style='font-size: 16px; line-height: 1.6;'>
                Olá, obrigado por se cadastrar! Para concluir o seu cadastro, copie o código abaixo:
            </p>
            <p
                style='text-align: center; font-size: 24px; font-weight: bold; background-color: #ecf0f1; padding: 10px; border-radius: 5px;'>
                <?php echo $codigo ?>
            </p>
            <p style='font-size: 16px; line-height: 1.6; text-align: center;'>
                Se você não solicitou este e-mail, por favor, ignore-o.
            </p>
            <p style='font-size: 14px; color: #7f8c8d; text-align: center;'>
                Atenciosamente,<br>
                Episódio Zero
            </p>
        </div>
        <?php
        return ob_get_clean();
    }

    public function enviarCodigo($emailDestinatario, $codigo)
    {

        try {
            $this->Destinatario($emailDestinatario);
            $this->mail->isHTML(true);
            $this->mail->Subject = 'Código de verificação de E-mail';
            $this->mail->Body = 'teste';//$this->CorpoEmail($codigo);
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return $this->mail->ErrorInfo;
        }
    }

    public function verificarCodigo($codigoEnviado, $codigoDigitado)
    {
        return $codigoEnviado === (int) $codigoDigitado;
    }

    // Realiza o registro do usuário no banco de dados
    public function registrarUsuario($nome, $email, $senha, $pdo)
    {
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $hash]);

        return $this->logarUsuario($nome, $hash, $pdo);
    }

    // Realiza o login do usuário após o registro
    private function logarUsuario($nome, $hash, $pdo)
    {
        $sql = "SELECT id, nome FROM usuarios WHERE nome = ? AND senha = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $hash]);
        $usuario = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (!empty($usuario)) {
            session_start();
            $_SESSION['id'] = $usuario[0]['id'];
            $_SESSION['nome'] = $usuario[0]['nome'];
            return true;
        }
        return false;
    }

    // Processa a validação do código e realiza o registro e login
    public function processarRegistro($nome, $email, $senha, $codigoEnviado, $codigoDigitado, $pdo)
    {
        if ($this->verificarCodigo($codigoEnviado, $codigoDigitado)) {
            return $this->registrarUsuario($nome, $email, $senha, $pdo);
        } else {
            session_destroy();
            session_start();
            $_SESSION['erro'] = "<p id='erro'>Código inválido!</p>";
            header('Location: registro.php');
            exit();
        }
    }
}
