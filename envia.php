<?php

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $fone = addslashes($_POST['fone']);

    $to = "thales---medeiros@hotmail.com";
    $assunto = "leads";

    $email = "Nome: " . $nome . "\n" . "Email: " . $email . "\n" . "Telefone: " . $fone;

    $cabeca = "From: teste@thales.com" . "\n" . "Reply-to: " . $email."\n" . "X=Mailer:PHP/" . phpversion();

    if(mail($to, $assunto, $email, $cabeca)){
        echo("Email enviado!");
    }else{
        echo("Houve erro!");
    }

?>