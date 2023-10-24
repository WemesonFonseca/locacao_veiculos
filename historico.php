<!-- Página do histrico de reservas -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Histórico de Reservas</title>
</head>
<body>
    <h3 class="mt-3">Histórico de Reservas</h3>

    <?php
    // Conexão com o banco de dados
    $conexao = new mysqli('localhost', 'root', '', 'locacao_carros');
    
    if ($conexao->connect_error) {
        die('Erro de conexão com o banco de dados: ' . $conexao->connect_error);
    }
    
    // Consulta para obter o histórico de reservas
    if (isset($_SESSION['usu_cod'])) {
    $usu_cod = $_SESSION['usu_cod'];
    $sql = "SELECT car_cod, car_desc, car_placa, data_aluguel FROM his_historico WHERE usu_cod = $usu_cod";
    $result = $conexao->query($sql);

    // Mostrar o resultado da consulta
    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<tr><th>Carro</th><th>Id</th><th>Placa</th><th>Data de Reserva</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['car_desc'] . '</td>';
            echo '<td>' . $row['car_cod'] . '</td>';
            echo '<td>' . $row['car_placa'] . '</td>';
            echo '<td>' . $row['data_aluguel'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Nenhuma reserva encontrada.";
    }
    // Mensagem de alerta caso o usuário não esteja logado
} else {
    echo '<div class="alert alert-danger" role="alert">Usuário não autenticado.</div>';
}
    ?>
</body>
</html>


