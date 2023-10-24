<!-- Página Index -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>BSB Car</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body style="background-color: #e5e5e5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					// Roteamento das página externas do sistema
					include('config.php');

					switch (@$_REQUEST['page']) {
						// Verificar o login do usuário
						case 'verificar':
							include('verificar.php');
							break;
						// Dashboard das páginas
						case 'dashboard':
							include('dashboard.php');
							break;
						// Página de logout(sair do sistema)
						case 'logout':
							include('logout.php');
							break;						
						// Página de cadastro
					    case 'cadastro':
					      include('cadastro.php');
					      break;
					    case 'salvar-cadastro':
					      include('salvar-cadastro.php');
					      break;  
					    // Página de recuperar senha
					    case 'recuperar':
					      include('recuperar.php');
					      break; 
					    case 'recuperar-senha':
					    	include('recuperar-senha.php');
					    	break;
					    // Página de login
						default:
							include("login.php");
					}
				?>
			</div>
		</div>
	</div>  
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

