<!-- Página para salvar os dados alterados pelo usuário no perfil -->
<?php
if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    // Conexão com o banco de dados
    $HOST = "localhost";
    $USER = "root";
    $PASS = "";
    $BASE = "locacao_carros";

    // Criar uma conexão com o banco de dados
    $conn = new MySQLi(HOST,USER,PASS,BASE);

    // Verifique se a conexão 
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    switch ($acao) {

        // Case salvar os dados alterados
        case 'alterar_dados':
            $novo_nome = $_POST['nome_usuario'];
            $novo_email = $_POST['email_usuario'];

            // Atualizar os dados no banco
            $sql = "UPDATE usu_usuario SET nome_usuario = ?, email_usuario = ? WHERE nome_usuario = ?";

            // Preparar a instrução SQL para execução
            $stmt = $conn->prepare($sql);

            // Vincular valores a parâmetros na consulta preparada
            if ($stmt) {
                $stmt->bind_param("sss", $novo_nome, $novo_email, $novo_nome);

                if ($stmt->execute()) {
                    echo "<script>alert('Dados alterados com sucesso!');</script>";
                    echo "<script>location.href='?page=dashboard&pag=perfil';</script>";
                } else {
                    echo "<script>alert('Erro ao editar dados: " . $stmt->error . "');</script>";
                    echo "<script>location.href='?page=dashboard&pag=perfil';</script>";
                }

                $stmt->close();
            } else {
                echo "<script>alert('Erro na preparação da consulta: " . $conn->error . "');</script>";
                echo "<script>location.href='?page=dashboard&pag=perfil';</script>";
            }
            break;

            // Case salvar a senha alterada  (Método MD5 para criptografar a senha no banco de dados)
        case 'alterar_senha':
            $senha_atual = md5($_POST['senha_atual']);
            $nova_senha = md5($_POST['nova_senha']);
            $confirmar_senha = md5($_POST['confirmar_senha']);
            $nome_usuario = $_SESSION['nome'];

            // Verifique se a senha atual corresponde à senha no banco de dados
            $sql = "SELECT senha_usuario FROM usu_usuario WHERE nome_usuario = '$nome_usuario'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $senha_no_banco = $row['senha_usuario'];

                if ($senha_atual === $senha_no_banco) {

                    // Verifique se as novas senhas coincidem
                    if ($nova_senha === $confirmar_senha) {
                        $update_sql = "UPDATE usu_usuario SET senha_usuario = '$nova_senha' WHERE nome_usuario = '$nome_usuario'";
                        if ($conn->query($update_sql) === TRUE) {

                    // Se todas as condições forem atendidas, atualize a senha no banco de dados
                            echo "<script>alert('Senha alterada com sucesso!');</script>";
                            echo "<script>location.href='?page=dashboard&pag=perfil';</script>";
                        } else {
                    // Se ocorrer um erro na atualização da senha
                            echo "<script>alert('Erro ao alterar a senha: " . $conn->error . "');</script>";
                            echo "<script>location.href='?page=dashboard&pag=alterar-senha';</script>";
                        }
                    } else {
                    // Se as novas senhas não coincidirem
                        echo "<script>alert('As novas senhas não coincidem.');</script>";
                        echo "<script>location.href='?page=dashboard&pag=alterar-senha';</script>";
                    }
                } else {
                    // Se a senha atual estiver incorreta
                    echo "<script>alert('A senha atual está incorreta.');</script>";
                    echo "<script>location.href='?page=dashboard&pag=alterar-senha';</script>";
                }
            }
            break;

        default:
            echo "Ação desconhecida: $acao";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
