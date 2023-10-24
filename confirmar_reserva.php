<!-- Página de processo e confirmação da reserva -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['car_cod'])) {
    $car_cod = $_GET['car_cod'];

    // Verificar se o usuário está autenticado
    if (isset($_SESSION['usu_cod'])) {
        $usu_cod = $_SESSION['usu_cod'];

        // Verificar se o usuário já reservou o carro
        $sql_check_reservation = "SELECT COUNT(*) as count FROM his_historico WHERE car_cod = '$car_cod' AND usu_cod = '$usu_cod'";

        $result_check_reservation = $conn->query($sql_check_reservation);

        if ($result_check_reservation) {
            $row_check_reservation = $result_check_reservation->fetch_assoc();

            if ($row_check_reservation['count'] > 0) {
                // O carro já foi reservado pelo usuário
                print "<script>alert('Você já reservou este carro. Não é possível reservá-lo novamente.');</script>";
                print "<script>location.href='?page=dashboard&pag=inicio';</script>";
            } else {
                // O carro ainda não foi reservado pelo usuário
                $HOST = "localhost";
                $USER = "root";
                $PASS = "";
                $BASE = "locacao_carros";

                // Criar uma conexão com o banco de dados
                $conn = new MySQLi(HOST,USER,PASS,BASE);

                // Verifique se a conexão 
                if ($conn->connect_error) {
                    die("Falha na conexão: " . $conn->connect_error);
                }

                // Consulta para obter a descrição e a placa do carro
                $sql = "SELECT car_desc, car_placa FROM Car_carro WHERE car_cod = '$car_cod'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Descrição e a placa do carro da consulta
                    $row = $result->fetch_assoc();
                    $car_desc = $row['car_desc'];
                    $car_placa = $row['car_placa'];

                    // Data e hora da reserva
                    $data_aluguel = date("Y-m-d H:i:s"); 

                    // Registar no histórico o carro reservado
                    $sql = "INSERT INTO his_historico (car_cod, car_desc, car_placa, data_aluguel, usu_cod) VALUES ('$car_cod', '$car_desc', '$car_placa', '$data_aluguel', '$usu_cod')";

                    if ($conn->query($sql) === TRUE) {
                        // Mensagem de registrado sucesso
                        echo '<div class="alert alert-success mt-3" role="alert">Carro reservado! Compareça a uma unidade em até 24 horas para retirada do veículo.</div>';
                    } else {
                        // Mensagem de erro ao registrar no histórico
                        echo '<div class="alert alert-danger" role="alert">Erro na reserva.</div>';
                    }
                } else {
                    // Se o carro não for encontrado, exibir uma mensagem de erro
                    echo '<div class="alert alert-danger" role="alert">Erro na reserva: Carro não encontrado.</div>';
                }

                // Fechar a conexão com o banco de dados
                $conn->close();
            }
        } else {
            // Erro na verificação de reserva
            echo '<div class="alert alert-danger" role="alert">Erro na reserva: Verificação de reserva falhou.</div>';
        }
    } else {
        // Se o código do usuário não estiver na sessão, exibir uma mensagem de erro
        echo '<div class="alert alert-danger" role="alert">Erro na reserva: Usuário não autenticado.</div>';
    }
} else {
    // Se não houver dados válidos, exibir uma mensagem de erro
    echo '<div class="alert alert-danger" role="alert">Erro na reserva.</div>';
}
?>
<!-- Detalhes do carro -->
<?php
if (isset($car_desc)) {
    echo '<div class="car-details">';
    echo "<h2 class='text-center'>Detalhes do Carro</h2>";
    echo "<p class='text-center'>Descrição: $car_desc</p>";
    echo "<div class='text-center'><img src='image/carros/carro$car_cod.png' alt='$car_desc' style='width: 33rem;'></div>";
    echo '</div>';
}

// Verificar o código do carro e usuário
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['car_cod'])) {
    $car_cod = $_GET['car_cod'];
    $usu_cod = $_SESSION['usu_cod'];

    $HOST = "localhost";
    $USER = "root";
    $PASS = "";
    $BASE = "locacao_carros";

    // Crie uma conexão com o banco de dados
    $conn = new MySQLi(HOST,USER,PASS,BASE);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Executar uma consulta para verificar se o usuário já reservou o carro atual
    $sql_check_reservation = "SELECT COUNT(*) as count FROM his_historico WHERE car_cod = '$car_cod' AND usu_cod = '$usu_cod'";

    $result_check_reservation = $conn->query($sql_check_reservation);

    if ($result_check_reservation) {
        $row_check_reservation = $result_check_reservation->fetch_assoc();

        if ($row_check_reservation['count'] > 0) {
            // Se o carro estiver reservado pelo, ocutar o botão de cancelamento
            echo '<div class="mt-5 text-center">';
            echo '<a href="?page=dashboard&pag=cancelar&car_cod=' . $car_cod . '" class="card-link btn btn-danger">Cancelar reserva</a>';
            echo '</div>';
        }
    }

    // Fechar conexão com o banco de dados
    $conn->close();
}
?>