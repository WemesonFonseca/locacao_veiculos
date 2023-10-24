<?php
// Verificar se o usuário está logado
if (!isset($_SESSION['nome'])) {
// Se não estiver, vai redirecionar para a página de login 
    header("Location: login.php");
    exit;
}

$nome_usuario = $_SESSION['nome'];

// Conexão com o banco de dados
$HOST = "localhost";
$USER = "root";
$PASS = "";
$BASE = "locacao_carros";

// Crie uma conexão com o banco de dados
$conn = new MySQLi(HOST,USER,PASS,BASE);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Consulta SQL para buscar o email do usuário logado
$sql = "SELECT email_usuario FROM usu_usuario WHERE nome_usuario = '$nome_usuario'";

$res = $conn->query($sql);

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $email_usuario = $row["email_usuario"];
} else {
    // Trate o caso em que o email do usuário não foi encontrado
    $email_usuario = "E-mail não encontrado";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Processar os dados do formulário
    $novo_nome = $_POST['nome_usuario'];
    $novo_email = $_POST['email_usuario'];

}

$conn->close();
?>
<!-- Formulário para mostar os dados que serão alterados -->
<div class="container">
    <div class="row">
        <div class="offset-lg-4 col-lg-4 mt-5 p-5 card">
            <h3 class="text-center" style="margin-bottom: 25px;">Alterar dados</h3>
            <form action="?page=dashboard&pag=salvar-dados" method="post">
                <input type="hidden" name="acao" value="alterar_dados">
                <div class="mb-3">
                    <label for="nome_usuario">Nome:</label>
                    <input type="text" name="nome_usuario" value="<?php echo $nome_usuario; ?>" class="form-control" readonly>
					<small id="nomeHelp" class="form-text text-muted">Para alterar seu nome, entre em contato com o administrador do sistema.</small>
                </div>
                <div class="mb-3">
                    <label for="email_usuario">E-mail:</label>
                    <input type="text" name="email_usuario" value="<?php echo $email_usuario; ?>" class="form-control" autocomplete="off">
                </div>
                <div class="container-fluid">
                    <div class="row my-3">
                        <div>
                            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                            <a href="?page=dashboard&pag=perfil" class="mx-3  btn btn-danger btn-sm"></i>Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


