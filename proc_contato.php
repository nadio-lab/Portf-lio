<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
    
    // Validação básica
    if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
        header("Location: contato.php?status=error");
        exit();
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contato.php?status=error");
        exit();
    }
    
    // Configurar e-mail
    $para = "rodriguespongolola47@gmail.com"; // SEU E-MAIL AQUI
    $assunto_email = "Contato do Portfólio: $assunto";
    
    $corpo = "Nome: $nome\n";
    $corpo .= "E-mail: $email\n\n";
    $corpo .= "Mensagem:\n$mensagem";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Enviar e-mail
    if (mail($para, $assunto_email, $corpo, $headers)) {
        header("Location: contacto.php?status=success");
    } else {
        header("Location: contacto.php?status=error");
    }
} else {
    header("Location: contacto.php");
}
exit();
?>
