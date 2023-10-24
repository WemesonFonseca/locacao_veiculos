<?php
// Conexão com o banco de dados 
$HOST = "localhost";
$USER = "root";
$PASS = "";
$BASE = "locacao_carros";

// Criar uma conexão com o banco de dados
$conn = new MySQLi(HOST,USER,PASS,BASE);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verifica se o nome do usuário está na sessão
if (isset($_SESSION['nome'])) {
    $nome_usuario = $_SESSION['nome'];

    // Consulta SQL para buscar o email do usuário com base no nome de usuário
    $sql = "SELECT email_usuario FROM usu_usuario WHERE nome_usuario = '$nome_usuario'"; 

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $email_usuario = $row["email_usuario"];
    } else {
        $nome_usuario = "Usuário não encontrado";
        $email_usuario = "E-mail não encontrado";
    }
} else {
    $nome_usuario = "Usuário não logado";
    $email_usuario = "E-mail não logado";
}

$conn->close();
?>
<!-- Exibir os dados do usuário -->
<div class="container">
    <div class="row">
        <div class="offset-lg-4 col-lg-4 mt-5 p-5 card">
            <table class="table">
                <tr>
                    <h3 class="text-center" style="margin-bottom: 25px;">Dados do perfil</h3>
                    <th class="text-end"><strong>Nome:</strong></th>
                    <td><?= $nome_usuario ?></td>
                </tr>
                <tr>
                    <th class="text-end"><strong>E-mail:</strong></th>
                    <td><?= $email_usuario ?></td>
                </tr>
            </table>
            <!-- Opções de alterar dados ou senha -->
            <div class="container-fluid">
                <div class="row my-3">
                    <div>
                        <a href="?page=dashboard&pag=alterar-dados" class="mx-3  btn btn-primary btn-sm"><i class="bi bi-pencil-square"> </i>Alterar dados</a>
                        <a href="?page=dashboard&pag=alterar-senha" class="mx-3  btn btn-primary btn-sm"><i class="bi bi-key"> </i>Alterar senha</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


