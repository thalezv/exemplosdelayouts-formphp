<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $emailForm = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $fone = htmlspecialchars($_POST['fone'] ?? '');

    $to = "thales---medeiros@hotmail.com";
    $assunto = "Leads";
    $mensagem = "Nome: $nome\nEmail: $emailForm\nTelefone: $fone";

    $cabecalho = "From: teste@thales.com\r\n";
    $cabecalho .= "Reply-To: $emailForm\r\n";
    $cabecalho .= "X-Mailer: PHP/" . phpversion();

    if (mail($to, $assunto, $mensagem, $cabecalho)) {
        echo "Email enviado!";
    } else {
        echo "Houve erro!";
    }
}
?>