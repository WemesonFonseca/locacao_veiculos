<!-- Página de logout (sair) do sistema -->
<?php
	session_start();
	unset($_SESSION['nome']);
	session_destroy();
	header('Location: index.php');