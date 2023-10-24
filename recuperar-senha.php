<!-- Configurção para recuperar a senha. (Obs: só funciona com um servidor real) -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "locacao_carros");

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Recuperar o e-mail do formulário
    $email_usuario = $_POST["email_usuario"];

    // Gerar uma senha temporária aleatória
    $senha_temporaria = bin2hex(random_bytes(8)); // Gera uma senha de 8 caracteres hexadecimal

    // Hash da senha temporária (opcional)
    $senha_temporaria_hash = password_hash($senha_temporaria, PASSWORD_DEFAULT);

    // Atualizará a senha do usuário no banco de dados 
    $sql = "UPDATE usu_usuario SET senha_usuario = '$senha_temporaria_hash' WHERE email_usuario = '$email_usuario'";

    if ($conn->query($sql) === TRUE) {
        // Enviará a senha temporária por e-mail 
        $assunto = "Recuperação de Senha";
        $mensagem = "Sua nova senha temporária é: $senha_temporaria";
        mail($email_usuario, $assunto, $mensagem);

        echo "Uma nova senha temporária foi enviada para o seu e-mail. Verifique sua caixa de entrada.";
    } else {
        echo "Erro ao processar a solicitação de recuperação de senha.";
    }

    $conn->close();
}
?>
