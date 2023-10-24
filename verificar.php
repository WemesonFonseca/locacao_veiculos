<!-- Página para verificar o login -->
<?php
	session_start();

	if (empty($_POST['nome_usuario']) || empty($_POST['senha_usuario'])) {
    header("Location: index.php");
    exit;
}

	$usuario = $_POST['nome_usuario'];
	$senha   = $_POST['senha_usuario'];

	$sql = "SELECT * FROM usu_usuario
			WHERE nome_usuario='{$usuario}'
			AND senha_usuario='".md5($senha)."'";


	$res = $conn->query($sql);

	if($res->num_rows > 0){
		$row = $res->fetch_assoc();
		$_SESSION['nome'] = $usuario;
		$_SESSION['usu_cod'] = $row['usu_cod'];
		print "<script>location.href='?page=dashboard&pag=inicio';</script>";
	}else{
		print "<script>alert('Usuário e/ou senha incorreto');</script>";
		print "<script>location.href='index.php';</script>";
	}