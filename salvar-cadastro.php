<!-- Página para salvar o cadastro do usuário -->
<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome_usuario = $_POST["nome_usuario"];
            $email_usuario = $_POST["email_usuario"];
            $senha_usuario = $_POST["senha_usuario"];
            $confirmar_senha = $_POST["confirmar_senha"];

            // Conferir se as senhas são iguais 
            if ($senha_usuario == $confirmar_senha) {
                $senha_hash = md5($senha_usuario);
                
                // Salvar as informações no banco de dados
                $sql = "INSERT INTO usu_usuario (nome_usuario, email_usuario, senha_usuario) 
                        VALUES('".$nome_usuario."', '".$email_usuario."', '".$senha_hash."')";
                
                $res = $conn->query($sql);
                // Informa se o cadastro foi realizado ou deu erro
                if($res == true){
                    echo "<script>alert('Cadastro realizado com sucesso');</script>";
                    echo "<script>location.href='?page=login';</script>";
                } else {
                    echo "<script>alert('Erro ao realizar o cadastro');</script>";
                    echo "<script>location.href='?page=cadastro';</script>";
                }
                // Informar que as senhas não são iguais
            } else {
                echo "<script>alert('As senhas não coincidem. Tente novamente.');</script>";
                echo "<script>location.href='?page=cadastro';</script>";
            }
        }
        break; 
    }
?>
