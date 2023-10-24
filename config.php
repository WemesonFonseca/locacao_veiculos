<!-- Página de configuração do banco de dados, no caso um banco de dados local -->
<?php 
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('BASE', 'locacao_carros');

	$conn = new MySQLi(HOST,USER,PASS,BASE);

	// Verificar conexão
	if($conn->connect_errno){
		printf("Conexão falhou", $conn->connect_error);
		exit();
	}
?>
