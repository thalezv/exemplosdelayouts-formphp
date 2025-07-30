<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $emailForm = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $fone = htmlspecialchars($_POST['fone'] ?? '');

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '***';
        $mail->Password = '***';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('***', 'Formulário do Site Teste');
        $mail->addAddress($emailForm, $nome);

        // Conteúdo do e-mail
        $mail->isHTML(false);
        $mail->Subject = 'Novo lead do site';
        $mail->Body = "Nome: $nome\nEmail: $emailForm\nTelefone: $fone";

        $mail->send();
        echo "✅ E-mail enviado com sucesso!";
    } catch (Exception $e) {
        echo "❌ Erro ao enviar: {$mail->ErrorInfo}";
    }
}
?>